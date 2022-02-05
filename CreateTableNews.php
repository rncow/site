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

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "CREATE TABLE news (
                id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(200) NOT NULL,
                text TEXT NOT NULL,
                date DATETIME NOT NULL
                )";

            if ($conn->query($sql) === TRUE) {
                echo "Table news created successfully";
            } else {
                echo "Error creating table: " . $conn->error;
            }

            $conn->close();
        }
        ?>
    </body>
</html>


