<?php

use app\Models\Users;

spl_autoload_register();
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$segments = explode('/', trim($uri, '/'));

require 'routes.php';
global $routes;

require 'app/libs.php';

$returnRoute = new app\Classes\Routes;

$returnRoute->ExploreRoutes($routes, $segments);
