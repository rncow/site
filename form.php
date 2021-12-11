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

include 'static date method.php';
    if (($_GET["date"]) != '') {
        print ("Введённая дата: " . RuTimeReturn::returnTime($_GET["date"]));
    } else print "Дата не была введена.";
}
?>

</body>
</html>