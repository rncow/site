<?php

namespace app\Controllers;

class Error
{
    public function e404 ()
    {
        echo render('error404');
    }
}