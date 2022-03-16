<?php
//var_dump($_SERVER['REQUEST_URI']);
//var_dump($conn->ReturnConnection());
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', trim($uri, '/'));
require 'routes.php';
global $routes;
$counter = new Counter();
echo '<pre>';
print_r($segments);
print_r($counter->ExploreRoutes($routes, $segments));
echo '</pre>';