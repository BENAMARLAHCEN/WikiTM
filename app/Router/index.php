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

$router->get(BS_URI . '/Wiki', WikiController::class, 'index','admin');
$router->post(BS_URI . '/accept', WikiController::class, 'public','admin');
$router->post(BS_URI . '/archive', WikiController::class, 'archive','admin');

$router->get(BS_URI . '/Dashboard', DashController::class, 'index','admin');

$router->get(BS_URI . '/Category', CategoryController::class, 'index','admin');
$router->post(BS_URI . '/Category/insert', CategoryController::class, 'insert','admin');
$router->post(BS_URI . '/Category/update', CategoryController::class, 'update','admin');
$router->post(BS_URI . '/Category/delete', CategoryController::class, 'delete','admin');
$router->post(BS_URI . '/getCategory', CategoryController::class, 'getCategory','admin');

$router->get(BS_URI . '/Tags', TagController::class, 'index','admin');
$router->post(BS_URI . '/getTag', TagController::class, 'getTag','admin');
$router->post(BS_URI . '/Tags/insert', TagController::class, 'insert','admin');
$router->post(BS_URI . '/Tags/update', TagController::class, 'update','admin');
$router->post(BS_URI . '/Tags/delete', TagController::class, 'delete','admin');



$router->get(BS_URI . '/MyWiki', WikiController::class, 'authorWiki','author');
$router->post(BS_URI . '/MyWiki', WikiController::class, 'delete','author');
$router->get(BS_URI . '/AddWiki', WikiController::class, 'addform','author');
$router->get(BS_URI . '/EditWiki', WikiController::class, 'Editform','author');
$router->post(BS_URI . '/AddWiki', WikiController::class, 'insert','author');
$router->post(BS_URI . '/EditWiki', WikiController::class, 'update','author');
$router->post(BS_URI . '/deleteWiki', WikiController::class, 'delete','author');



$router->get(BS_URI . '/Profile', ProfileController::class, 'index','author');
$router->post(BS_URI . '/Profile/update', ProfileController::class, 'update','author');
$router->post(BS_URI . '/UpdatePassword', ProfileController::class, 'updatePassword','author');


$router->get(BS_URI . '/login', AuthController::class, 'index','guest');
$router->get(BS_URI . '/signup', AuthController::class, 'signupF','guest');
$router->post(BS_URI . '/login', AuthController::class, 'login','guest');
$router->post(BS_URI . '/signup', AuthController::class, 'signup','guest');


$router->get(BS_URI . '/', HomeController::class, 'index');
$router->get(BS_URI . '/wikiDetail', HomeController::class, 'wikiDetail');


$router->post(BS_URI . '/FilterByCategory', FilterController::class, 'FilterByCategory');
$router->post(BS_URI . '/FilterByTagTitle', FilterController::class, 'search');


$router->get(BS_URI . '/logout', AuthController::class, 'logout');


$router->dispatch();
