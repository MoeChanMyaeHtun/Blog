<?php

class Auth
{
    public static function check():bool
    {
        return Session::has('auth');
    }

    public static function guest():bool
    {
        return ! Session::has('auth');
    }

    public static function user(): User|null
    {
        // return Session::get('auth');
        $auth = Session::get('auth');
        if($auth) {
            $user = new User;
            $user->id = $auth['id'];
            $user->name = $auth['name'];
            $user->email = $auth['email'];

            return $user;
        }

        return null;
    }
}


// Auth::check();
// Auth::user();