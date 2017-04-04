<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //用户的个人主页
    public function index($userName)
    {
        return view('profile.questions');
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
