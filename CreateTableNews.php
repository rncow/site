<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Создание таблицы</title>
</head>
    <body>
        <form action="" method="post">
            <input type="button" name="buttonName" value="Создать">
        </form>
        <?php
        if (isset($_POST['buttonName'])) {
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
                echo "Table news created successfully<br>";
            } catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }

            $conn = null;
        }
        ?>
    </body>
</html>


