<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'body', 'user_id','is_first'];


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

    //帖子---答案
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    //用户关注问题多对多关系
    public function followers()
    {
        return $this->belongsToMany(User::class,'user_question')->withTimestamps();
    }

    //问题---评论
    public function comments()
    {
        return $this->morphMany('App\Comment','commentable');
    }

    public function scopePublished($query)
    {
        return $query->where('is_hidden','F');
    }


}
