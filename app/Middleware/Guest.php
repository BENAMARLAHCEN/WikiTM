<?php

namespace App\Middleware;

class Guest
{
    public function handle(){
        if (isset($_SESSION['role'])) {
            header('location:'.BS_URI.'/');
            exit();
        }
    }
}
