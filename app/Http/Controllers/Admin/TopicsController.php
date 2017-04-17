<?php
namespace App\Http\Controllers\Admin;

use App\Repositories\TopicRepository;
use Auth;
use Illuminate\Http\Request;

class TopicsController
{
    private $topic;
    public function __construct(TopicRepository $topic)
    {
        $this->topic = $topic;
    }
    //标签列表
    public function index()
    {
        $topics =  $this->topic->getTopicsFeed();
        return view('admin.topics.index',compact('topics'));
    }

    public function store()
    {

    }

    //删除标签
    public function destroy($id)
    {
        $comment = $this->comment->byId($id);
        $comment->delete();
        return redirect()->route('admin.topics');
    }
}