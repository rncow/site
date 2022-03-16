<?php
include 'RuDate.php';
include 'WorkWithString.php';
?>

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
        print ("Введённая дата: " . RuDate::getRuDate($_GET["date"]));
    } else print "Дата не была введена.";
}
?>

<!-- Блок для проверки работы класса, который потом можно удалить  -->
<br>
<?php
    $someText = new WorkWithString('Василий Иванович');
    print 'Объявленная строка: ' . $someText->showString() . '<br>';
    print 'Длина строки: ' . $someText->lengthOfString() . '<br>';
    $someText->addStringPart(' и Петька');
    print 'Дополненная строка: ' . $someText->showString() . '<br>';
    $someText->rewriteString('Петька и Василий Иванович');
    print 'Переписанная строка: ' . $someText->showString() . '<br>';
    $someText->clearString();
    print 'После двоеточия ничего не будет, т.к. строка очищена:' . $someText->showString();
?>
<!-- Конец блока  -->
</body>
</html>