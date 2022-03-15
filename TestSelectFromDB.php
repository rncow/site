<?php

require('./config.php');
global $conn;

$sql = "SELECT COUNT(*) FROM news";
$result = $conn->query($sql);

$total_rows = $result->fetch_array(MYSQLI_NUM)[0];
echo $total_rows;

$conn->close();
