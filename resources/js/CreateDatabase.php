<?php
            require('./Config.php');
            global $conn;
            //создание бд
            $sql = "CREATE DATABASE MyDB";
            if ($conn->query($sql) === TRUE) {
                echo "Database created successfully";
            } else {
                echo "Error creating database: " . $conn->error;
            }
            $conn->close();


