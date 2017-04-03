<?php

namespace App\Http\Controllers;

use App\Message;
use App\Repositories\MessageRepository;
use Auth;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    protected $message;


    public function __construct(MessageRepository $message)
    {
        $this->message = $message;
    }
    //用户的站内信
    public function index()
    {

        $messages = $this->message->getAllMessages();
        $user = Auth::user();
        return view('notifications.index',['messages'=>$messages->unique('dialog_id'),'user'=>$user]);
    }
}
