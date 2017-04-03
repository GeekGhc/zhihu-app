<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    //用户设置的面板
    public function index()
    {
        return view('users.setting');
    }

    //用户设置保存
    public function store(Request $request)
    {
        $settings = array_merge(user()->setting,array_only($request->all(),['city','site','github','bio']));

        user()->update(['setting'=>$settings]);

        return back();
    }
}
