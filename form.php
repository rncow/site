<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Отправка строки/приём ассоциативного массива</title>
</head>
<body>

<form action="" method="get">
    <label for="name">Введите имя:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="date">Введите дату:</label><br>
    <input type="date" id="date" name="date"><br>
    <input hidden type="submit" id="submit" value="Отправить">
</form>

<script>
    document.getElementById('name').addEventListener('change', displayButton);
    document.getElementById('date').addEventListener('change', displayButton);
    function displayButton() {
        if (document.getElementById('name').value != '' && document.getElementById('date').value != '') {
            document.getElementById('submit').hidden = false;
        }
        else {
            document.getElementById('submit').hidden = true;
        }
    }
</script>

<?php
if (isset($_GET["name"]) && isset($_GET["date"])) {
    if (($_GET["name"]) != '') {
        $array = [
            'name' => htmlspecialchars($_GET["name"]),
            'length' => mb_strlen($_GET["name"])
        ];
        print("Имя: " . $array['name'] . ", кол-во символов: " . $array['length'] . '<br>');
    } else print "Имя не было введено.";

    if (($_GET["date"]) != '') {
        $monthsList = [".01." => "января", ".02." => "февраля",
            ".03." => "марта", ".04." => "апреля", ".05." => "мая", ".06." => "июня",
            ".07." => "июля", ".08." => "августа", ".09." => "сентября",
            ".10." => "октября", ".11." => "ноября", ".12." => "декабря"];

        $dateFromForm = date("d.m.Y", strtotime($_GET["date"]));
        $replace = date(".m.", strtotime($_GET["date"]));
        $dateFromForm = str_replace($replace, " ".$monthsList[$replace]." ", $dateFromForm);
        print ("Введённая дата: " . $dateFromForm);
    } else print "Дата не была введена.";
}
?>

</body>
</html>