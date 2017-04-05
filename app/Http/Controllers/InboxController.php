<?php

namespace App\Http\Controllers;

use App\Message;
use App\Notifications\NewMessageNotification;
use App\Repositories\MessageRepository;
use Auth;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    protected $message;


    public function __construct(MessageRepository $message)
    {
        $this->middleware('auth');
        $this->message = $message;
    }

    //私信列表
    public function index()
    {
        $messages = Message::where('to_user_id',user()->id)
            ->orWhere('from_user_id',user()->id)
            ->with(['fromUser','toUser'])->latest()->get();
        return $messages->unique('dialog_id');
        return view('inbox.index',['messages'=>$messages->unique('dialog_id')->groupBy('to_user_id')]);
    }

    //显示私信消息详情
    public function show($dialogId)
    {
        $messages = $this->message->getDialogMessages($dialogId);
        $messages->markAsRead();
        return view('inbox.show',compact('messages','dialogId'));
    }

    //回复私信
    public function store($dialogId)
    {
        $message = Message::where('dialog_id',$dialogId)->first();
        $toUserId = $message->from_user_id === user()->id ? $message->to_user_id : $message->from_user_id;
        $newMessage = $this->message->create([
            'from_user_id'=>Auth::id(),
            'to_user_id'=> $toUserId,
            'body'=>request('body'),
            'dialog_id'=>$dialogId
        ]);
        //回复私信的消息通知
        $newMessage->toUser->notify(new NewMessageNotification($newMessage));
        return back();
    }
}
