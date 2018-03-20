<?php

namespace App\Helpers;

class Helpers
{
    public static function isAuth()
    {
        $user = session()->get('user');
        return isset($user) ? true : false;
    }
}
