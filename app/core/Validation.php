<?php

namespace App\core;

class Validation
{
    public static function verfyEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }
    public static function verfyName($name)
    {
        if (!preg_match('/^[a-zA-Z]+$/', $name)) {
            return false;
        }
        return true;
    }
    public static function verfyPassword($password)
    {
        if (!preg_match('/^[0-9a-zA-Z.\-_&$@*%!\/]{8,50}+$/', $password)) {
            return false;
        }
        return true;
    }
}