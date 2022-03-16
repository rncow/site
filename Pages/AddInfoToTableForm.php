<!DOCTYPE html>
<?php
    spl_autoload_register();
?>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить новости</title>
</head>
<body>

<form action="" method="get">
    <table>
        <tr>
            <td>
                <label for="titleRu">Заголовок:</label><br>
                <input type="text" id="titleRu" name="titleRu"><br>
                <label for="textRu">Текст новости:</label><br>
                <textarea rows="10" cols="45" id="textRu" name="textRu"></textarea><br>
            </td>
            <td>
                <label for="titleEn">Title:</label><br>
                <input type="text" id="titleEn" name="titleEn"><br>
                <label for="textEn">News text:</label><br>
                <textarea rows="10" cols="45" id="textEn" name="textEn"></textarea><br>
            </td>
        </tr>
    </table>
    <label for="date">Введите дату:</label><br>
    <input type="date" id="date" name="date"><br>
    <input hidden type="submit" id="submit" value="Отправить">
</form>

<script>
    document.getElementById('titleRu').addEventListener('change', displayButton);
    document.getElementById('textRu').addEventListener('change', displayButton);
    document.getElementById('titleEn').addEventListener('change', displayButton);
    document.getElementById('textEn').addEventListener('change', displayButton);
    document.getElementById('date').addEventListener('change', displayButton);
    function displayButton() {
        if (document.getElementById('titleRu').value != '' && document.getElementById('textRu').value != ''
            && document.getElementById('titleEn').value != '' && document.getElementById('textEn').value != ''
            && document.getElementById('date').value != '') {
            document.getElementById('submit').hidden = false;
        }
        else {
            document.getElementById('submit').hidden = true;
        }
    }
</script>
<?php
if (isset($_GET["titleRu"]) && isset($_GET["textRu"]) && isset($_GET["titleEn"]) && isset($_GET["textEn"])
    && isset($_GET["date"])) {
    $config = new Scripts\Config;
    $conn = $config->ReturnConnection();

    $titleRu = addslashes($_GET["titleRu"]);
    $textRu = addslashes($_GET["textRu"]);
    $titleEn = addslashes($_GET["titleEn"]);
    $textEn = addslashes($_GET["textEn"]);
    $date = $_GET["date"];

    //команда вставки id и даты новости в таблицу news
    $sql = "INSERT INTO news (date) VALUES ('$date')";
    //выполнение команды
    if ($conn->query($sql) === TRUE) {
        //получение последнего ID новости
        $last_id = $conn->insert_id;
        echo "Новая запись №" . $last_id . " добавлена в таблицу news<br>";
        //команда вставки новости на русском и английском в таблицу news_localized
        $sql = "INSERT INTO news_localized (news_id, language_id, title, text) 
                VALUES ('$last_id', 2, '$titleRu', '$textRu'), ('$last_id', 1, '$titleEn', '$textEn')";
        if ($conn->query($sql) === TRUE) {
            echo "Записи новости добавлены в таблицу news_localized<br>";
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

</body>
</html>
