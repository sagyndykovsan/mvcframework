<?php

use App\View;
use App\Application;

function views_path() {
    return __DIR__."/../views/";
}

function response() {
    return Application::$response;
}

function view($view) {
    return View::make($view);
}