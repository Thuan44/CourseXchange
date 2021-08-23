<?php

use Router\Router;

require '../vendor/autoload.php';

// Constants to access Views and Public folders
define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' .  DIRECTORY_SEPARATOR);
define('PUBLIC_DIRECTORY', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);

$router = new Router($_GET['url']);

$router->get('/', 'App\Controllers\DashboardController@index');
$router->get('/courses/:id', 'App\Controllers\DashboardController@show');

$router->run();
