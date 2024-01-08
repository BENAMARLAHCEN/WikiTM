<?php
namespace App\Controller;
use App\Controller;
class HomeController extends Controller{
    function index(){
        $this->render('home');
    }
}