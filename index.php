<?php

use Yalesov\Yaml\Yaml;

require_once 'vendor/autoload.php';

// define
define('DS', DIRECTORY_SEPARATOR, true);
define('BASE_PATH', __DIR__ . DS, TRUE);
define('CONF_FILES', __DIR__ . "/config/");

// Routes init
$app = System\App::instance();
$app->request = System\Request::instance();
$app->route = System\Route::instance($app->request);
$route = $app->route;

// yaml
app()->settings = Yaml::parse(CONF_FILES . 'settings.yml');

// twig
$loader = new Twig_Loader_Filesystem('templates');
app()->twig = new Twig_Environment($loader);

// Routes
$route->get('/', 'controllers\Pages@index');
$route->end();
