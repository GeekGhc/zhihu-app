<?php


namespace App\Repositories;


use App\Message;

class MessageRepository
{
    //创建消息
    public function create(array $attributes)
    {
        return Message::create($attributes);
    }

    //拿到所有的私信
    public function getAllMessages()
    {
        return Message::where('to_user_id', user()->id)
            ->orWhere('from_user_id', user()->id)
            ->with(['fromUser' => function ($query) {
                return $query->select(['id', 'name', 'avatar']);
            }, 'toUser' => function ($query) {
                return $query->select(['id', 'name', 'avatar']);
            }])->latest()->get();
    }

    //拿到对话的messages
    public function getDialogMessages($dialogId)
    {
        return Message::where('dialog_id',$dialogId)->latest()->get();
    }


    public function getSingleMessage($dialogId)
    {
        return Message::where('dialog_id',$dialogId)->first();
    }
}