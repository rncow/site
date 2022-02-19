 <?php
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "MyDB";
            //создание соединения
            $conn = new mysqli($servername, $username, $password, $dbname);
            //чек соединения
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            //команда создания таблицы
            $sql = "CREATE TABLE news (
                id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(200) NOT NULL,
                text TEXT NOT NULL,
                date DATETIME NOT NULL
                )";
            //выполнение команды
            if ($conn->query($sql) === TRUE) {
                echo "Table news created successfully";
            } else {
                echo "Error creating table: " . $conn->error;
            }

            $conn->close();



