<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Создание БД</title>
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
        ?>
    </body>
</html>

