<?php

use App\Controller\AuthController;
use App\Controller\CategoryController;
use App\Controller\DashController;
use App\Controller\HomeController;
use App\Controller\ProfileController;
use App\Controller\TagController;
use App\Controller\WikiController;
use App\Router;

$router = new Router();

$router->get(BS_URI . '/', HomeController::class, 'index');
$router->get(BS_URI . '/login', AuthController::class, 'index')->only('guest');
$router->get(BS_URI . '/signup', AuthController::class, 'signupF')->only('guest');
$router->post(BS_URI . '/login', AuthController::class, 'login')->only('guest');
$router->post(BS_URI . '/signup', AuthController::class, 'signup')->only('guest');
$router->post(BS_URI . '/logout', AuthController::class, 'logout')->only('guest');

$router->get(BS_URI . '/Dashboard', DashController::class, 'index');

$router->get(BS_URI . '/Category', CategoryController::class, 'index');
$router->post(BS_URI . '/Category/insert', CategoryController::class, 'insert');
$router->post(BS_URI . '/Category/update', CategoryController::class, 'update');
$router->post(BS_URI . '/Category/delete', CategoryController::class, 'delete');

$router->get(BS_URI . '/Tags', TagController::class, 'index');
$router->post(BS_URI . '/Tags/insert', TagController::class, 'insert');
$router->post(BS_URI . '/Tags/update', TagController::class, 'update');
$router->post(BS_URI . '/Tags/delete', TagController::class, 'delete');

$router->get(BS_URI . '/Wiki', WikiController::class, 'index');
$router->post(BS_URI . '/archive', WikiController::class, 'archive');
$router->post(BS_URI . '/accept', WikiController::class, 'public');


$router->get(BS_URI . '/MyWiki', WikiController::class, 'authorWiki');
$router->get(BS_URI . '/AddWiki', WikiController::class, 'addform');
$router->get(BS_URI . '/EditWiki', WikiController::class, 'Editform');
$router->post(BS_URI . '/AddWiki', WikiController::class, 'insert');
$router->post(BS_URI . '/EditWiki', WikiController::class, 'update');
$router->post(BS_URI . '/deleteWiki', WikiController::class, 'delete');

// $router->post(BS_URI . '/Wiki/insert', WikiController::class, 'insert');
// $router->post(BS_URI . '/Wiki/update', WikiController::class, 'update');
// $router->post(BS_URI . '/Wiki/delete', WikiController::class, 'delete');


$router->get(BS_URI . '/Profile', ProfileController::class, 'index');


$router->dispatch();
