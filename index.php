<?php
spl_autoload_register();
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$segments = explode('/', trim($uri, '/'));

require 'routes.php';
global $routes;

require 'app/libs.php';

$returnRoute = new app\Classes\Routes;

use app\Models\News as NewsModel;

$col1 = "news_id";
$col2 = "title";
$col3 = "text";
$col4 = "date";
$langID = 1;

$returnRoute->ExploreRoutes($routes, $segments);
