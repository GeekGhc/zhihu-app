<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $fillable = ['from_user_id', 'to_user_id', 'body', 'has_read','dialog_id'];

    //发送私信的用户
    public  function fromUser()
    {
        return $this->belongsTo('App\User','from_user_id');
    }

    //接受私信的用户
    public  function toUser()
    {
        return  $this->belongsTo('App\User','to_user_id');
    }

    //标志私信已读
    public function markAsRead()
    {
        if(is_null($this->read_at)){
            $this->forceFill(['has_read'=>'T','read_at'=>$this->freshTimestamp()])->save();
        }
    }

    public function newCollection(array $models = [])
    {
        return new MessageCollection($models);
    }

    //判断消息是否是已读
    public function read()
    {
        return $this->has_read === 'T';
    }
    public function unRead()
    {
        return $this->has_read === 'F';
    }
    public function shouldAddUnreadClass()
    {
        if(user()->id === $this->from_user_id){
            return false;
        }
        return $this->unRead();
    }

    //私信未读消息个数
    public function unReadCount()
    {
       return  Message::where('dialog_id',$this->dialog_id)->where('has_read','F')->count();
    }
}
