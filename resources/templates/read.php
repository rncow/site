<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Успех</title>
</head>
<body>
    <h1>Удачный рендер новостей</h1>
    <img src="../storage/images/бабулех.png">
    <table>
        <tr>
            <th>Заголовок</th>
            <th>Текст новости</th>
            <th>Дата публикации</th>
        </tr>
    <?php foreach($news as $element): ?>
        <tr>
            <td><?=$element['title'];?></td>
            <td><?=$element['text'];?></td>
            <td><?=$element['date'];?></td>
        </tr>
    <?php endforeach ?>
    </table>
</body>
</html>

