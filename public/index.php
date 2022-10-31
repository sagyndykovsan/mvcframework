<?php

use App\Application;
use App\Controllers\HomeController;
use App\Controllers\CommentController;

function x($n) {
    return 'hey';
}

echo x();

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application();

$app->router->get('/', [HomeController::class, 'index']);
$app->router->get('/comments', [CommentController::class, 'create']);
$app->router->post('/comments', [CommentController::class, 'store']);

$app->run();