<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //用户的个人主页
    public function index($userName)
    {
        $user = User::where('name',$userName)->first();
        $questions = $user->questions;
        return view('profile.questions',compact(['user','questions']));
    }

    //用户的回答
    public function answers($userName)
    {
        return view('profile.answers');
    }

    //用户的回答
    public function like($userName)
    {
        return view('profile.like');
    }

    //用户的回答
    public function following($userName)
    {
        return view('profile.following');
    }

    //用户的回答
    public function followers($userName)
    {
        return view('profile.followers');
    }
}
