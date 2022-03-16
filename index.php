<?php
//var_dump($_SERVER['REQUEST_URI']);
//spl_autoload_register();
//$obj = new Core\User;
//$obj2 = new Core\Admin\Controller;
//$obj3 = new Project\User\Data;
//$conn = new Scripts\Config;
//var_dump($obj);
//var_dump($obj2);
//var_dump($obj3);
//var_dump($conn->ReturnConnection());
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if($uri === '/')
    require 'Pages/InfoFromTableNews.php';
elseif($uri === '/createnews')
    require 'Pages/AddInfoToTableForm.php';
else
    require 'Pages/error404.html';