<?php include 'layouts/header.php';?>
    <h1>Авторизация</h1>
    <form action="" method="POST">
        <label for="login">Логин</label><br>
        <input id="login" name="login"><br>
        <label for="password">Пароль</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input hidden type="submit" id="submit">
    </form>
    <script src="resources/js/hideFieldsLogin.js"></script>
<?php include 'layouts/footer.php';
