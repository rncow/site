<?php

namespace app\Models;

use app\Classes\Models;

/**
 * Класс Users реализует функционал по работе с таблицей users
 */

class Users extends Models
{
    protected $table = 'users';

    public function createUser (string $login, string $password)
    {
        $this->select('login', 'password_hash')->insert($login, $password);
    }

    public function isLoginBusy (string $login) : bool
    {
        if($this->select('login')->where("login = '$login'")->get()) {
            return true;
        } else {
            return false;
        }

    }
}