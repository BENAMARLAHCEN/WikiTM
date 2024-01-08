<?php
require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "./../");
$dotenv->load();

// print_r($_ENV);
$router = require '../app/Routers/index.php';
