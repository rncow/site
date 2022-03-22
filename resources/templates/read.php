<?php include 'layouts/header.php';?>
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
<?php include 'layouts/footer.php';