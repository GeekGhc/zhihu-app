<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //用户头像
    public function avatar()
    {
        return view('users.avatar');
    }
}
