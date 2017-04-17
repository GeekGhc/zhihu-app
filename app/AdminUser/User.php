<?php
namespace App\AdminUser;

use Auth;
class User
{
    public function info()
    {
        $user = Auth::user();
        return $user;
    }
}