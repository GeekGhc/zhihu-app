<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $fillable = ['from_user_id', 'to_user_id', 'body', 'has_read','dialog_id'];

    public  function fromUser()
    {
        return $this->belongsTo('App\User','from_user_id');
    }

    public  function toUser()
    {
        return  $this->belongsTo('App\User','to_user_id');
    }
}
