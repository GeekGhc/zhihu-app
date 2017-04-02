<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    //用户的站内信
    public function index()
    {
        $user = Auth::user();
        return view('notifications.index',compact('user'));
    }
}
