<?php

use App\Controller\AuthController;
use App\Controller\CategoryController;
use App\Controller\DashController;
use App\Controller\FilterController;
use App\Controller\HomeController;
use App\Controller\ProfileController;
use App\Controller\TagController;
use App\Controller\WikiController;
use App\Router;

$router = new Router();


$router->get(BS_URI . '/Dashboard', DashController::class, 'index')->only('admin');

$router->get(BS_URI . '/Category', CategoryController::class, 'index')->only('admin');
$router->post(BS_URI . '/Category/insert', CategoryController::class, 'insert')->only('admin');
$router->post(BS_URI . '/Category/update', CategoryController::class, 'update')->only('admin');
$router->post(BS_URI . '/Category/delete', CategoryController::class, 'delete')->only('admin');
$router->post(BS_URI . '/getCategory', CategoryController::class, 'getCategory')->only('admin');

$router->get(BS_URI . '/Tags', TagController::class, 'index')->only('admin');
$router->post(BS_URI . '/Tags/insert', TagController::class, 'insert')->only('admin');
$router->post(BS_URI . '/Tags/update', TagController::class, 'update')->only('admin');
$router->post(BS_URI . '/Tags/delete', TagController::class, 'delete')->only('admin');
$router->post(BS_URI . '/getTag', TagController::class, 'getTag')->only('admin');

$router->get(BS_URI . '/Wiki', WikiController::class, 'index')->only('admin');
$router->post(BS_URI . '/accept', WikiController::class, 'public')->only('admin');

$router->post(BS_URI . '/archive', WikiController::class, 'archive')->only('admin');



$router->get(BS_URI . '/MyWiki', WikiController::class, 'authorWiki')->only('author');
$router->post(BS_URI . '/MyWiki', WikiController::class, 'delete')->only('author');
$router->get(BS_URI . '/AddWiki', WikiController::class, 'addform')->only('author');
$router->get(BS_URI . '/EditWiki', WikiController::class, 'Editform')->only('author');
$router->post(BS_URI . '/AddWiki', WikiController::class, 'insert')->only('author');
$router->post(BS_URI . '/EditWiki', WikiController::class, 'update')->only('author');
$router->post(BS_URI . '/deleteWiki', WikiController::class, 'delete')->only('author');



$router->get(BS_URI . '/Profile', ProfileController::class, 'index')->only('author');
$router->post(BS_URI . '/Profile/update', ProfileController::class, 'update')->only('author');
$router->post(BS_URI . '/UpdatePassword', ProfileController::class, 'updatePassword')->only('author');


$router->get(BS_URI . '/login', AuthController::class, 'index')->only('guest');
$router->get(BS_URI . '/signup', AuthController::class, 'signupF')->only('guest');
$router->post(BS_URI . '/login', AuthController::class, 'login')->only('guest');
$router->post(BS_URI . '/signup', AuthController::class, 'signup')->only('guest');


$router->get(BS_URI . '/', HomeController::class, 'index');
$router->get(BS_URI . '/wikiDetail', HomeController::class, 'wikiDetail');


$router->post(BS_URI . '/FilterByCategory', FilterController::class, 'FilterByCategory');
$router->post(BS_URI . '/FilterByTagTitle', FilterController::class, 'search');


$router->get(BS_URI . '/logout', AuthController::class, 'logout');

$router->dispatch();
