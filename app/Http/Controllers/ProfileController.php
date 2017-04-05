<?php

namespace App\Http\Controllers;

use App\Question;
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
        $user = User::where('name',$userName)->first();
        $answersId = $user->answers->unique('question_id')->pluck('question_id');
        $questions = Question::find($answersId->toArray());
        return view('profile.answers',compact(['user','questions']));
    }

    //用户的收藏
    public function like($userName)
    {
        $user = User::where('name',$userName)->first();
        $questions = $user->likes;
        return view('profile.like',compact(['user','questions']));
    }

    //用户关注的人
    public function following($userName)
    {
        $user = User::where('name',$userName)->first();
        $followings = $user->followings;
        return view('profile.following',compact(['user','followings']));
    }

    //用户的粉丝
    public function followers($userName)
    {
        $user = User::where('name',$userName)->first();
        $followers = $user->followers;
        return view('profile.followers',compact(['user','followers']));
    }
}
