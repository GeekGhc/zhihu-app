<?php

namespace App\Http\Controllers;

use App\Message;
use Auth;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    //用户的站内信
    public function index()
    {

        $messages = Message::where('to_user_id',user()->id)
            ->orWhere('from_user_id',user()->id)
            ->with(['fromUser'=>function($query){
                return $query->select(['id','name','avatar']);
            },'toUser'=>function($query){
                return $query->select(['id','name','avatar']);
            }])->latest()->get();

        $user = Auth::user();
        return view('notifications.index',['messages'=>$messages->unique('dialog_id'),'user'=>$user]);
    }
}
