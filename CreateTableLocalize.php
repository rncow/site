<?php
    $servername = "phpstudy";
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
    $sql = "CREATE TABLE localize (
                    lng VARCHAR(3) NOT NULL PRIMARY KEY,
                    lngName VARCHAR(32)
                    )";
    //выполнение команды
    if ($conn->query($sql) === TRUE) {
        echo "Table localize created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
