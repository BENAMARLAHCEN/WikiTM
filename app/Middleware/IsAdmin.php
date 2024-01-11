<?php

namespace App\Middleware;

use App\core\Helper;

class ISAdmin
{
    public function handle(){
        if (!Helper::hasrole(['admin'])) {
            header('location:'.BS_URI.'/');
            exit();
        }
    }
}
