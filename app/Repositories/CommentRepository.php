<?php


namespace App\Repositories;


use App\Comment;

class CommentRepository
{
    public function create(array $attributes)
    {
        return Comment::create($attributes);
    }

    public function byId($id)
    {
        return Comment::find($id);
    }

    //拿到所有的评论
    public function getCommentsFeed()
    {
        return Comment::with('user')->get();
    }
}