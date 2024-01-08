<?php

namespace App\Middleware;

class Admin
{
    public function handle(){
        if (!$_SESSION['role'] == 'admin' ?? false) {
            header('location:'.BS_URI.'/');
            exit();
        }
    }
}
