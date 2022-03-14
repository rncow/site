<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <!-- Настройка viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Вывод новостей</title>
    <!-- Bootstrap CSS (jsDelivr CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Bootstrap Bundle JS (jsDelivr CDN) -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
<input type="radio" id="languageChoiceRus" name="language" value="rus">
<label for="languageChoiceRus">Русский</label>
<input type="radio" id="languageChoiceEng" name="language" value="eng">
<label for="languageChoiceEng">English</label>
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
    //проверка, есть ли GET запрос
    if (isset($_GET['pageno'])) {
        //если да то переменной $pageno присваиваем значение
        $pageno = $_GET['pageno'];
    } else {
        //иначе присваиваем $pageno один
        $pageno = 1;
    }
    //назначение количества данных на одной странице
    $sizePage = 5;
    //вычисление с какого объекта начать выводить
    $offset = ($pageno-1) * $sizePage;

    //запрос для получения количества элементов
    $countSql = "SELECT COUNT(*) FROM news";
    //отправление запроса для получения количества элементов
    $result = $conn->query($countSql);
    //получение результата
    $total_rows = $result->fetch_array(MYSQLI_NUM)[0];
    //вычисление количества страниц
    $total_pages = ceil($total_rows / $sizePage);

    //запрос для получения данных
    $sql = "SELECT * FROM news ORDER BY date LIMIT $offset, $sizePage";
    //выполнение команды
    $resultData = $conn->query($sql);
?>
<table>
    <tr>
        <th>Заголовок</th>
        <th>Текст новости</th>
        <th>Дата публикации</th>
    </tr>
<?php
    while ($row = mysqli_fetch_array($resultData)) {
        //вывод
        echo '<tr><td>' . $row['title'] . '</td><td>'. $row['text'] . '</td><td>' . $row['date'] . '</td></tr>';
    }
    $conn->close();
?>
</table>
<ul class="pagination">
    <li><a href="?pageno=1">First </a></li>
    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev </a>
    </li>
    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next </a>
    </li>
    <li><a href="?pageno=<?php echo $total_pages; ?>">Last </a></li>
</ul>

</body>
</html>