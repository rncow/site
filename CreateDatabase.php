<?php
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


