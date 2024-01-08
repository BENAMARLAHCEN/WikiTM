<?php

namespace App\Middleware;

class Middleware
{
    public const MAP = [
        'admin' => admin::class,
        'author' => author::class,
        'guest' => guest::class
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
