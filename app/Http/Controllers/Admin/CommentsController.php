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
        if(user()->hasRole('admin') || user()->hasRole('admin-two')){
            $comments = $this->comment->getCommentsFeed();
            return view('admin.comments.index',compact('comments'));
        }
        return redirect()->route('admin.index');
    }

    //删除评论
    public function destroy($id)
    {
        if(user()->hasRole('admin') || user()->hasRole('admin-two')){
            $comment = $this->comment->byId($id);
            $comment->delete();
            return redirect()->route('admin.comments');
        }
        return redirect()->route('admin.index');
    }
}
