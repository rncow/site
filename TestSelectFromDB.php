<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "MyDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) FROM news";
$result = $conn->query($sql);

$total_rows = $result->fetch_array(MYSQLI_NUM)[0];
echo $total_rows;

$conn->close();
