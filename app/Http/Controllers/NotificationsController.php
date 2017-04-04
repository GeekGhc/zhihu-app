<?php

namespace App\Http\Controllers;

use App\Message;
use App\Repositories\MessageRepository;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

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

    //标志私信已读
    public function show(DatabaseNotification $message)
    {
        $message->markAsRead();
        return redirect(Request::query('redirect_url'));
    }

    //标记全部消息为已读
    public function read()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return redirect('/messages');
    }
}
