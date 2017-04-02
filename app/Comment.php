<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['user_id', 'body', 'commentable_id', 'commentable_type','level','parent_id'];

    public function commentable()
    {
        return $this->morphTo();
    }

    //评论---用户
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
