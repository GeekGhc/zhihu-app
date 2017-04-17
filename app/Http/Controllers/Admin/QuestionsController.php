<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Repositories\Admin\QuestionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionsController extends Controller
{
    private $question;
    public function __construct(QuestionRepository $question)
    {
        $this->question = $question;
    }
    public function index()
    {
        $questions = $this->question->getQuestionsFeed();
        return view('admin.questions.index',compact('questions'));
    }

    //创建问题页面
    public function create()
    {
        return view("admin.questions.create");
    }

    //保存问题
    public function store(Request $request)
    {
        $topics = $this->question->normalizeTopics($request->get('topics'));
        $data = [
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'user_id' => Auth::id(),
        ];
        $question = $this->question->create($data);
        Auth::user()->increment('questions_count');
        $question->topics()->attach($topics);
        return redirect()->route('admin.questions', [$question->id]);
    }

    //编辑问题页面
    public function edit($id)
    {
        $question = $this->question->byId($id);
        if(Auth::user()->owns($question)){
            return view("admin.questions.edit",compact('question'));
        }
    }

    //编辑问题
    public function update(Request $request,$id)
    {

    }

    public function destroy($id)
    {

    }
}
