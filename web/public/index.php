<?php

use App\classes\Home;
use App\core\Router;

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

$router = new Router();

$router
    ->get('/', [App\classes\Home::class, 'index'])
    ->get('/invoice', [App\classes\Invoice::class, 'index'])
    ->get('/invoice/create', [App\classes\Invoice::class, 'create'])
    ->post('/invoice/create', [App\classes\Invoice::class, 'store']);

echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));

dd($_COOKIE);