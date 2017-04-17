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

    public function index()
    {
        $users = $this->user->getAllUsers();
        return view("admin.users.index",compact('users'));
    }
}
