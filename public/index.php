<?php

use Router\Router;
use Database\DBConnection;

require '../vendor/autoload.php';

// Constants to access Views and Public folders
define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' .  DIRECTORY_SEPARATOR);
define('PUBLIC_DIRECTORY', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);

// Constantes de la BDD
define('DB_NAME', 'courseXchange');
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PWD', 'root');

$router = new Router($_GET['url']);

$router->get('/', 'App\Controllers\DashboardController@index');
$router->get('/courses/:id', 'App\Controllers\DashboardController@show');

$router->run();
