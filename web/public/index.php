<?php

use App\Controllers\HomeController;
use App\Controllers\InvoiceController;
use App\Core\App;
use App\Core\Config;
use App\Core\Router;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

session_start();

const STORAGE_PATH = __DIR__ . '/../storage/';
const VIEW_PATH = __DIR__ . '/../views/';

$router = new Router();

$router
    ->get('/', [HomeController::class, 'index'])
    ->get('/invoice', [InvoiceController::class, 'index'])
    ->get('/invoice/create', [InvoiceController::class, 'create'])
    ->post('/invoice/create', [InvoiceController::class, 'store']);


(new App(
    $router,
    [
        'uri'       => $_SERVER['REQUEST_URI'],
        'method'    => $_SERVER['REQUEST_METHOD']
    ],
    (new Config($_ENV))
))->run();