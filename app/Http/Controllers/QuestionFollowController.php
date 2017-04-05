<?php

namespace App\Http\Controllers;

use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;
use Auth;

class QuestionFollowController extends Controller
{
    protected $question;

    public function __construct(QuestionRepository $question)
    {
        $this->middleware('auth');
        $this->question = $question;
    }

    //用户关注某个问题
    public function follow($questionId)
    {
        Auth::user()->followThis($questionId);
        return back();
    }

    //用户是否关注了这个问题
    public function isFollow(Request $request)
    {
        $user =  Auth::guard('api')->user();
        $followed = $user->followed($request->get('question'));
        if($followed){
            return response()->json(['followed' => true]);
        }
        return response()->json(['followed' => false]);
    }

    //关注该问题
    public function followThisQuestion(Request $request)
    {
        $user =  Auth::guard('api')->user();
        $question  = $this->question->byId($request->get('question'));
        $followed = $user->followThis($question->id);

        if(count($followed['detached'])>0){//如果是取消关注
            $question->decrement('followers_count');
            return response()->json(['followed' => false]);
        }
        $question->increment('followers_count');
        return response()->json(['followed' => true]);

    }
}
