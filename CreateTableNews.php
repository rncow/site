 <?php
             require('./config.php');
             global $conn;
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



