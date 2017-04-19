<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\CommentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    private $comment;

    public function __construct(CommentRepository $comment)
    {
        $this->comment = $comment;
        $this->middleware('admin');
    }

    //评论列表
    public function index()
    {
        $comments = $this->comment->getCommentsFeed();
        return view('admin.comments.index',compact('comments'));
    }

    //删除评论
    public function destroy($id)
    {
        $comment = $this->comment->byId($id);
        $comment->delete();
        return redirect()->route('admin.comments');
    }
}
