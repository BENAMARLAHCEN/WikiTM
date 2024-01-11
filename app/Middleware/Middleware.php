<?php

namespace App\Middleware;

use App\core\Helper;

class Middleware
{
    public const MAP = [
        'admin' => IsAdmin::class,
        'author' => IsAuthor::class,
        'guest' => IsGuest::class
    ];

    public static function resolve($key)
    {
        if (!$key) {
            return;
        }
        $middleware = static::MAP[$key] ?? false;

        if (!$middleware) {

            throw new \Exception('No matching middleware fond for key'.$key);
        }
        (new $middleware)->handle();
    }
}
