 <?php
            $servername = "site";
            $username = "root";
            $password = "";
            $dbname = "MyDB";
            //создание соединения
            $conn = new mysqli($servername, $username, $password, $dbname);
            //чек соединения
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            //команда создания таблицы
            $sql = "CREATE TABLE news (
                id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                date DATE NOT NULL
                )";
            //выполнение команды
            if ($conn->query($sql) === TRUE) {
                echo "Table news created successfully";
            } else {
                echo "Error creating table: " . $conn->error;
            }

            $conn->close();



