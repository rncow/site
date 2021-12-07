<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Отправка строки/приём ассоциативного массива</title>
</head>
<body>

<form action="" method="get">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>
    <input type="submit" id="submit" value="Отправить">
</form>
<script>
    document.getElementById('submit').hidden = true;
    document.getElementById('name').addEventListener('input', displayButton);
    function displayButton() {
        document.getElementById('submit').hidden = false;
    }
</script>

<?php
if (isset($_GET["name"])) {
    if (($_GET["name"]) != '') {
        $array = [
            'name' => htmlspecialchars($_GET["name"]),
            'length' => mb_strlen($_GET["name"])
        ];
        print("Имя: " . $array['name'] . ", кол-во символов: " . $array['length']);
    } else print "Имя не было введено.";
}
?>

</body>
</html>