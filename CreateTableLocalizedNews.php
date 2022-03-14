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
    $sql = "CREATE TABLE localizedNews (
                        news_id BIGINT UNSIGNED NOT NULL,
                        language VARCHAR(3) NOT NULL,
                        title VARCHAR(256) NOT NULL,
                        text TEXT NOT NULL,
                        PRIMARY KEY (news_id, language),
                        FOREIGN KEY (news_id) REFERENCES news(id),
                        FOREIGN KEY (language) REFERENCES localize(lng)
                        )";
    //выполнение команды
    if ($conn->query($sql) === TRUE) {
        echo "Table localizedNews created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
