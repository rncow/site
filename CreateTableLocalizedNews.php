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
    $sql = "CREATE TABLE localizedNews (
                        id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,
                        news_id BIGINT NOT NULL,
                        lang_id BIGINT NOT NULL,
                        title VARCHAR(200) NOT NULL,
                        text TEXT NOT NULL,
                        PRIMARY KEY (id),
                        FOREIGN KEY (news_id) REFERENCES news(id),
                        FOREIGN KEY (lang) REFERENCES news(id),
                        )";
    //выполнение команды
    if ($conn->query($sql) === TRUE) {
        echo "Table localizedNews created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
