<?php

namespace App\Middleware;

use App\core\Helper;

class IsGuest
{
    public function handle(){
        if (!Helper::hasrole(['guest'])) {
            header('location:'.BS_URI.'/');
            exit();
        }
    }
}
