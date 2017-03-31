<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];


    //设置问题显示
    public function isHidden()
    {
        return $this->is_hidden === 'T';
    }

    //帖子---话题
    public function topics()
    {
        return $this->belongsToMany(Topic::class)->withTimestamps();
    }

    //帖子---用户
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //帖子---回复
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    //帖子---关注的人
    public function followers()
    {
        return $this->belongsToMany(User::class,'user_question')->withTimestamps();
    }

    public function comments()
    {
        return $this->morphMany('App\Comment','commentable');
    }

    public function scopePublished($query)
    {
        return $query->where('is_hidden','F');
    }


}
