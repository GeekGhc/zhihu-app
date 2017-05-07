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
        $this->middleware('admin');
    }
    public function index()
    {
        $questions = $this->question->getQuestionsFeed();
        if(user()->hasRole('admin') || user()->hasRole('admin-one')){
            return view('admin.questions.index',compact('questions'));
        }
        return redirect()->route('admin.index');
    }

    //创建问题页面
    public function create()
    {
        if(user()->hasRole('admin')){
            return view("admin.questions.create");
        }
    }

    //保存问题
    public function store(Request $request)
    {
        $topics = $this->question->normalizeTopics($request->get('topics'));
        $data = [
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'user_id' => Auth::id(),
            'is_first' => $request->get('is_first')
        ];
        $question = $this->question->create($data);
        Auth::user()->increment('questions_count');
        $question->topics()->attach($topics);
        return redirect()->route('admin.questions', [$question->id]);
    }

    //编辑问题页面
    public function edit($id)
    {
        if(user()->hasRole('admin') || user()->hasRole('admin-one')){
            $question = $this->question->byId($id);
            return view("admin.questions.edit",compact('question'));
        }
        return redirect()->route('admin.index');

    }

    //编辑问题
    public function update(Request $request,$id)
    {
        $question = $this->question->byId($id);
        $topics = $this->question->normalizeTopics($request->get('topics'));
        $question->update([
            'title'=>$request->get('title'),
            'body'=>$request->get('body'),
            'is_first'=>$request->get('is_first')
        ]);

        $question->topics()->sync($topics);
        return redirect()->route('admin.questions');
    }

    //删除问题
    public function destroy($id)
    {
        if(user()->hasRole('admin') || user()->hasRole('admin-one')){
            $question = $this->question->byId($id);
            $question->delete();
            return redirect()->route('admin.questions');
        }
        return redirect()->route('admin.index');
    }
}
