<?php
require('./config.php');
global $conn;
if(isset($_GET['newsID'])) {
    $sql = "DELETE FROM news WHERE id = " . $_GET['newsID'];
    $conn->query($sql);
}
header('Location: ' . $_SERVER['HTTP_REFERER']);