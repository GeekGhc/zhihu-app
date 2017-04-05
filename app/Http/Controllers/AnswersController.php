<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnswerRequest;
use App\Notifications\AnswerQuestionNotification;
use App\Repositories\AnswerRepository;
use Illuminate\Http\Request;
use Auth;

class AnswersController extends Controller
{
    protected $answer;
    public function test(){
        $user =  Auth::guard('api')->user()->id;
        dd($user);
//        $followed = $user->follows();

    }

    public function __construct(AnswerRepository $answer)
    {
        $this->answer = $answer;
    }

    //创建答案
    public function store(StoreAnswerRequest $request,$questionId)
    {
        $answer = $this->answer->create([
            'question_id'=>$questionId,
            'user_id' => Auth::id(),
            'body'=>$request->get('body')
        ]);
        $answer->question()->increment('answers_count');
        Auth::user()->increment('answers_count');
        $data = ['name'=>Auth::user()->name,'question'=>$answer->question];
        $answer->question->user->notify(new AnswerQuestionNotification($data));
        return back();
    }
}
