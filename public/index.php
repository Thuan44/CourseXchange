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

// Login
$router->get('/login', 'App\Controllers\UserController@login');
$router->post('/login', 'App\Controllers\UserController@loginPost');
$router->get('/logout', 'App\Controllers\UserController@logout');

// Signup
$router->get('/signup', 'App\Controllers\UserController@signup');
$router->post('/signup', 'App\Controllers\UserController@signupPost');

// Homepage
$router->get('/', 'App\Controllers\DashboardController@index');
$router->get('/courses/:id', 'App\Controllers\DashboardController@show');

// Course form
$router->get('/admin/courses', 'App\Controllers\CourseController@create');
$router->post('/admin/courses', 'App\Controllers\UserController@createPost');

$router->run();