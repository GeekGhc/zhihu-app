<?php


namespace App\Repositories;


use App\Comment;

class CommentRepository
{
    public function create(array $attributes)
    {
        return Comment::create($attributes);
    }
}