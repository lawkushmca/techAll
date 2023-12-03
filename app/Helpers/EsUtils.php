<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;
use App\Helpers\HConst;

class EsUtils
{
    public static function isAdmin()
    {
        // Check if the 'session_role' session key exists and has the 'admin' value
        return Session::has(HConst::SESSION_ROLE) && Session::get(HConst::SESSION_ROLE) === HConst::SESSION_ROLE_ADMIN;
    }

    public static function isEmployee()
    {
        // Check if the 'session_role' session key exists and has the 'employee' value
        return Session::has(HConst::SESSION_ROLE) && Session::get(HConst::SESSION_ROLE) === HConst::SESSION_ROLE_MEMBER;
    }

    public static function getUserId()
    {
        return auth()->user() ? auth()->user()->id : '';
    }

    public static function getUserEmail()
    {
        return auth()->user() ? auth()->user()->email : '';
    }
}
