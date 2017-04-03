<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use Hash;

class PasswordController extends Controller
{

    //用户密码修改表单
    public function password()
    {
        return view('users.password');
    }

    //密码修改
    public function update(ChangePasswordRequest $request)
    {
        if(Hash::check($request->get('old_password'),user()->password)){
            user()->password = bcrypt($request->get('password'));
            user()->save();
            flash('密码修改成功','success');

            return back();
        }

        flash('密码修改失败','danger');
        return back();
    }
}
