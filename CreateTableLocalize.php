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
    $sql = "CREATE TABLE localize (
                    id INT(2) PRIMARY KEY,
                    lng VARCHAR(3) NOT NULL,
                    lngName VARCHAR(16),
                    )";
    //выполнение команды
    if ($conn->query($sql) === TRUE) {
        echo "Table news created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
