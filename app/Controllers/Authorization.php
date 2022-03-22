<?php

namespace app\Controllers;

use app\Models\Users as UsersModel;

class Authorization
{
    public function login ()
    {
        echo render('login');
    }

    public function register ()
    {
        //проверка на пустые поля
        if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['confirm'])) {

            //проверка на совпадение значений пароля и его повторения
            if ($_POST['password'] == $_POST['confirm']) {

                $login = $_POST['login'];

                //проверка, занят ли введённый логин
                if (!(new UsersModel)->isLoginBusy($login)) {

                    $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

                    (new UsersModel)->createUser($login, $hash);

                    echo '<p>Пользователь создан</p>';

                } else {
                    echo '<p style="color:#ea0000">Введённый логин уже занят</p>';
                }
            } else {
                echo '<p style="color:#ffb300">Введённые пароли не совпадают</p>';
            }
        }
        echo render('register');
    }
}