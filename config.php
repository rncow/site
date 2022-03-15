<?php
$servername = "site";
$username = "root";
$password = "";
$dbname = "MyDB";

//создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);
//чек соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}