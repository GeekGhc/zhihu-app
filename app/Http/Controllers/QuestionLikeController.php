<?php

namespace App\Http\Controllers;

use App\Notifications\LikeQuestionNotification;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;
use Auth;

class QuestionLikeController extends Controller
{
    protected $question;

    public function __construct(QuestionRepository $question)
    {
        $this->middleware('auth');
        $this->question = $question;
    }

    //用户是否收藏了这个问题
    public function isLike(Request $request)
    {
        $user =  Auth::guard('api')->user();
        $liked = $user->hasLikedThis($request->get('question'));
        if($liked){
            return response()->json(['liked' => true]);
        }
        return response()->json(['liked' => false]);
    }


    //收藏该问题
    public function likeThisQuestion(Request $request)
    {
        $user =  Auth::guard('api')->user();
        $question  = $this->question->byId($request->get('question'));
        $liked = $user->likeThis($question->id);

        if(count($liked['detached'])>0){//如果是取消收藏
            user('api')->decrement('likes_count');
            return response()->json(['liked' => false]);
        }
        user('api')->increment('likes_count');
        $data = ['name'=>Auth::user()->name,'question'=>$question];
        $question->user->notify(new LikeQuestionNotification($data));
        return response()->json(['liked' => true]);

    }
}
