<?php

class Session
{
    public static function put(string $key,string $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key): mixed
    {
        // isset($_SESSION[$key])
        if(self::has($key)) {
            return $_SESSION[$key];
        }

        return null;
    }

    public static function all(): array
    {
        return $_SESSION;
    }

    public static function has($key): bool
    {
        return isset($_SESSION[$key]);

        // if(isset($_SESSION['auth'])) {
        //     return true;
        // }

        // return false;
    }

    public static function forget(string $key): void
    {
        unset($_SESSION[$key]);
    }
}