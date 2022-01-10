<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Создание таблицы</title>
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
    $dbname = "MyDB";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // установка режима сообщений о ошибках PDO: Выбрасывать исключения.
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "CREATE TABLE news (
        id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(200) NOT NULL,
        text TEXT NOT NULL,
        date DATETIME NOT NULL
        )";

        // использование exec(), т.к. никаких результатов не возвращается
        $conn->exec($sql);
        echo "Table MyGuests created successfully<br>";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}
