<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Repositories\Admin\AdminRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    private $admin;
    public function __construct(AdminRepository $admin)
    {
        $this->admin = $admin;
        $this->middleware('admin');
    }

    public function index()
    {
            $collects = $this->admin->dashboard_init_data();
            return view('admin.dashboard.index', compact('collects'));
    }

    public function adminInfo()
    {
        if(user()->hasRole('admin')){
            $user = Auth::user();
            return view('admin.users.admin',compact('user'));
        }
        return redirect()->route('admin.index');
    }
}
