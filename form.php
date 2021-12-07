<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Отправка строки/приём ассоциативного массива</title>
</head>
<body>

<form action="action_page.php" method="get">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>
    <input type="submit" value="Отправить">
</form>

<?php
if (isset($_GET["name"])) {
    if (($_GET["name"]) != '') {
        print("Имя: " . $array['name'] . ", кол-во символов: " . $array['length']);
    } else print "Имя не было введено.";
}

?>

</body>
</html>