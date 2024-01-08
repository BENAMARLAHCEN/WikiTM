<?php

namespace App\Middleware;

class Author
{
    public function handle(){
        if (!$_SESSION['role'] == 'author' ?? false) {
            header('location:'.BS_URI.'/');
            exit();
        }
    }
}
