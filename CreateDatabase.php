<?php

$servername = "localhost";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // установка режима сообщений о ошибках PDO: Выбрасывать исключения.
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE MyDB";
    // использование exec(), т.к. никаких результатов не возвращается
    $conn->exec($sql);
    echo "Database created successfully<br>";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
