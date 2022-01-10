<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Создание БД</title>
    </head>
    <body>
        <form action="" method="get">
            <input type="button" name="button" value="Создать">
        </form>
    </body>
</html>

<?php
if (isset($_GET['button'])) {
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
}
