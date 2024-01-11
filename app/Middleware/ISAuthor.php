<?php

namespace App\Middleware;

use App\core\Helper;

class ISAuthor
{
    public function handle(){
        if (!Helper::hasrole(['author'])) {
            header('location:'.BS_URI.'/');
            exit();
        }
    }
}
