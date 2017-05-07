<?php

namespace App;

use App\Mailer\UserMailer;
use Illuminate\Database\Eloquent\Model;
use Mail;
use Naux\Mail\SendCloudTemplate;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar','is_active', 'confirmation_token','api_token','setting','followers_count','followings_count',
        'questions_count','comments_count','answers_count','likes_count'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'setting'=>'array'
    ];

    //是否是admin
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public function canEnterBack()
    {
        return $this->hasRole('admin') || $this->hasRole('admin-one') ||$this->hasRole('admin-two');
    }
    public function settings()
    {
        return new Setting($this);
    }

    //是否属于本对象
    public function owns(Model $model)
    {
        return $this->id == $model->user_id;
    }

    //用户---问题
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    //用户---答案
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    //用户关注问题多对多关系
    public function follows()
    {
        return $this->belongsToMany(Question::class,'user_question')->withTimestamps();
    }
    //用户关注问题
    public function followThis($questionId)
    {
        return $this->follows()->toggle($questionId);
    }
    //用户是否关注某个问题
    public function followed($questionId)
    {
        return $this->follows()->where('question_id',$questionId)->count();
    }

    //用户关注的人
    public function followings()
    {
        return $this->belongsToMany(self::class,'followers','follower_id','followed_id')->withTimestamps();
    }
    //用户的粉丝
    public function followers()
    {
        return $this->belongsToMany(self::class,'followers','followed_id','follower_id')->withTimestamps();
    }
    //用户关注其他用户
    public function followThisUser($user)
    {
     return $this->followings()->toggle($user);
    }

    //用户点赞答案多对多关系
    public function votes()
    {
        return $this->belongsToMany(Answer::class,'votes')->withTimestamps();
    }
    //用户点赞一个答案
    public function voteFor($answer)
    {
        return $this->votes()->toggle($answer);
    }
    //用户是否已经对一个答案进行点赞
    public function hasVotedFor($answer)
    {
        return !! $this->votes()->where('answer_id',$answer)->count();
    }

    //用户收藏问题多对多的关系
    public function likes()
    {
        return $this->belongsToMany(Question::class,'likes')->withTimestamps();
    }
    //用户收藏一个问题
    public function likeThis($question)
    {
        return $this->likes()->toggle($question);
    }
    //用户是否收藏了这个问题
    public function hasLikedThis($question)
    {
        return $this->likes()->where('question_id',$question)->count();
    }

    //用户的私信
    public function messages()
    {
        return $this->hasMany(Message::class,'to_user_id');
    }

    //发送密码重置
    public function sendPasswordResetNotification($token)
    {
        (new UserMailer())->passwordReset($this->email,$token);
    }
}
