<?php

use App\Controller\HomeController;
use App\Router;

$router = new Router();

$router->get('/', HomeController::class, 'index');

$router->dispatch();
