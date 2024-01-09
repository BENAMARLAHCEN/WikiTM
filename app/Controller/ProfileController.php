<?php
namespace App\Controller;
use App\Controller;
use App\Model\User;

class ProfileController extends Controller{
    function index(){
        $user = new User();
        $user = $user->selectRecords('*',null,'create_date DESC');
        $this->view('user.profile',compact('user'));
    }
}