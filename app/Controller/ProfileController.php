<?php

namespace App\Controller;

use App\Controller;
use App\core\Session;
use App\core\Validation;
use App\Model\User;
use App\Model\Wiki;
use Dotenv\Validator;

class ProfileController extends Controller
{
    function index()
    {
        $user = new User();
        $user = $user->selectRecords('*', 'id = ' . $_SESSION['userId']);
        $this->view('user.profile', compact('user'));
    }

    function update()
    {
        $errors = [];
        $username = $_POST['username'] ?? '' ?? '';
        $about = $_POST['about'] ?? '';
        $Country = $_POST['Country'] ?? '';
        $Job = $_POST['job'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $email = $_POST['email'] ?? '';

        if (empty($username) || empty($email) || empty($password) ) {
            $errors['data'] = "insert all your information";
        }
        if (Validation::verfyEmail($email)) {
            $errors['email'] = "Please enter a valid Email adddress!";
        }
        if (!Validation::verfyName($username)) {
            $errors['name'] = "Please, enter valid name!";
        }

        if (count($errors) == 0) {
            $user = new User();
            if ($user->updateRecord(compact('username', 'about', 'Country', 'Job', 'phone', 'email'), Session::get('userId'))) {
                Session::add('valid', 'your profile is update successfully');
            }
        }
        Session::add('errors', compact('errors'));
        // header('location:/WikiTM/Profile');
    }


    function updatePassword()
    {
        $errors = [];
        $password = $_POST['password'] ?? '' ?? '';
        $newpassword = $_POST['newpassword'] ?? '';
        $renewpassword = $_POST['renewpassword'] ?? '';

        if (empty($renewpassword) || empty($newpassword) || empty($password)) {
            $errors['data'] = "insert all your information";
        }
        if (Validation::verfyPassword($newpassword)) {
            $errors['newpassword'] = "Please enter a valid Pasword adddress!";
        }
        if (Validation::confirm($newpassword, $renewpassword)) {
            $errors['renewpassword'] = "Please enter a valid Pasword adddress!";
        }

        if (count($errors) == 0) {
            $user = new User();
            $userpasword = $user->selectRecords('*', "id = " . Session::get('userId'));
            if (password_verify($newpassword, $userpasword)) {
                if ($user->updateRecord(['password' => $newpassword], Session::get('userId'))) {
                    Session::add('valid', 'your password is update successfully');
                }
                $errors['errors'] = "Surry we have some problems we can't update your password new";
            }
        }
        Session::add('errors', compact('errors'));
        header('location:/WikiTM/Profile');
    }
}
