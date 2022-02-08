<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить новости</title>
</head>
<body>

<form action="" method="get">
    <label for="title">Заголовок:</label><br>
    <input type="text" id="title" name="title"><br>
    <label for="date">Текст новости:</label><br>
    <textarea rows="10" cols="45" id="text" name="text"></textarea><br>
    <label for="date">Введите дату:</label><br>
    <input type="date" id="date" name="date"><br>
    <input hidden type="submit" id="submit" value="Отправить">
</form>

<script>
    document.getElementById('title').addEventListener('change', displayButton);
    document.getElementById('text').addEventListener('change', displayButton);
    document.getElementById('date').addEventListener('change', displayButton);
    function displayButton() {
        if (document.getElementById('title').value != '' && document.getElementById('text').value != ''
            && document.getElementById('date').value != '') {
            document.getElementById('submit').hidden = false;
        }
        else {
            document.getElementById('submit').hidden = true;
        }
    }
</script>
<?php
if (isset($_GET["title"]) && isset($_GET["text"]) && isset($_GET["date"])) {
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
    $title = $_GET["title"];
    $text = $_GET["text"];
    $date = $_GET["date"];
    //команда вставки
    $sql = "INSERT INTO news (title, text, date) VALUES ('$title', '$text', '$date')";
    //выполнение команды
    if ($conn->query($sql) === TRUE) {
        echo "Новая запись добавлена";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

</body>
</html>
