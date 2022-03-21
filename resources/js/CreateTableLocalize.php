<?php
    require('./Config.php');
    global $conn;
    //команда создания таблицы
    $sql = "CREATE TABLE languages (
                    lng VARCHAR(3) NOT NULL PRIMARY KEY,
                    lngName VARCHAR(32)
                    )";
    //выполнение команды
    if ($conn->query($sql) === TRUE) {
        echo "Table languages created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
