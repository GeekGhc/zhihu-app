<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{

    //用户密码修改表单
    public function password()
    {
        return view('users.password');
    }

    //密码修改
    public function update()
    {

    }
}
