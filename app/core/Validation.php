<?php

namespace App\core;

class Validation
{
    public static function verfyEmail($email)
    {
        return !filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    public static function verfyName($name)
    {
        return preg_match("/^[a-zA-Z-']+$/", $name);
    }
    public static function verfyPassword($password)
    {
        return !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password);
    }
    public static function confirm($valueA,$valueB){
        return $valueA === $valueB;
    }
}