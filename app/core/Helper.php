<?php

namespace App\core;

class Helper
{

    public static function hasrole(array $role): bool
    {
        $ROLE = $_SESSION['role'] ?? 'guest';
        foreach ($role as $key) {
            if (in_array($ROLE, $role)) {
                return true;
            }
        }
        return false;
    }
}
