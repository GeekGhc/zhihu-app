<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    //用户头像
    public function avatar()
    {
        return view('users.avatar');
    }

    //修改用户头像
    public function changeAvatar(Request $request)
    {
        $file = $request->file('img');
        $filename = 'images/avatars/'.md5(time().user()->id).'.'.$file->getClientOriginalExtension();

        Storage::disk('qiniu')->writeStream($filename,fopen($file->getRealPath(),'r'));


        user()->avatar = 'http://'.config('filesystems.disks.qiniu.domain').'/'.$filename;
        user()->save();

        return ['url'=>user()->avatar];
    }
}
