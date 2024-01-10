<?php

namespace App\Controller;

use App\Controller;
use App\core\Validation;
use App\Model\User;

class AuthController extends Controller
{
    function index()
    {
        $this->render('login');
    }
    function signupF()
    {
        $this->render('signup');
    }

    function login()
    {
        
    }
    function signup()
    {
        $errors = [];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $image = $_FILES['image']['name'];
        if (empty($username) || empty($email) || empty($password) || empty($image)) {
            $errors['data'] = "insert all your information";
        }
        if (Validation::verfyEmail($email)) {
            $errors['email'] = "Please enter a valid Email adddress!";
        }
        if (!Validation::verfyName($username)) {
            $errors['name'] = "Please, enter your name!";
        }
        if (Validation::verfyPassword($password)) {
            $errors['password'] = "Password must contain at least one lowercase letter, one uppercase letter, one digit, and be at least 8 characters long.";
        }
        if (count($errors) == 0) {
            $user = new User();
            if (count($user->selectRecords('*', 'email = ' . $email)) != 0) {
                $errors['data'] = "this email already exists";
            } else {
                $password = password_hash($password, PASSWORD_BCRYPT);
                $image_tmp_name = $_FILES['image']['tmp_name'];
                $image_folder = __DIR__ . "\\..\\..\\public\\assets\\upload\\user\\" . $image;
                if ($user->insertRecord(compact('username', 'email', 'password', 'image'))) {
                    move_uploaded_file($image_tmp_name, $image_folder);
                    header('location:login');
                    exit;
                }
            }
        }
        $this->render('signup', compact('errors'));
    }
    function logout()
    {
    }
}
