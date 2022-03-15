<?php

    require('./config.php');
    global $conn;
    //команда создания таблицы
    $sql = "CREATE TABLE news_localized (
                        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        news_id BIGINT UNSIGNED NOT NULL,
                        language_id BIGINT NOT NULL,
                        title VARCHAR(255) NOT NULL,
                        text TEXT NOT NULL,
                        FOREIGN KEY (news_id) REFERENCES news(id),
                        FOREIGN KEY (language_id) REFERENCES languages(id)
                        )";
    //выполнение команды
    if ($conn->query($sql) === TRUE) {
        echo "Table news_localized created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
