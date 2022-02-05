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
            //создание соединения
            $conn = new mysqli($servername, $username, $password);
            //чек соединения
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            //создание бд
            $sql = "CREATE DATABASE MyDB";
            if ($conn->query($sql) === TRUE) {
                echo "Database created successfully";
            } else {
                echo "Error creating database: " . $conn->error;
            }
            $conn->close();
        }
        ?>
    </body>
</html>

