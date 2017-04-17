<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Repositories\Admin\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    public function __construct(UserRepository  $user)
    {
        $this->user = $user;
//        $this->middleware('admin');
    }


    //系统用户
    public function index()
    {
        $users = $this->user->getAllUsers();
        return view("admin.users.index",compact('users'));
    }

    //系统用户信息修改
    public function update(Request $request,$id)
    {

    }

    //管理员信息修改
    public function updateProfile(Request $request)
    {
        user()->name = $request->get('name');
        user()->email = $request->get('email');
//        user()->password = bcrypt($request->get('password'));
        user()->save();
        return back();
    }
}
