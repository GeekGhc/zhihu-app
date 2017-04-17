<?php
namespace App\Repositories\Admin;
use App\Question;
use App\Topic;

class QuestionRepository
{
    //查找指定问题
    public function byId($id)
    {
        return Question::find($id);
    }

    //拿到所有问题
    public function getQuestionsFeed()
    {
        return Question::published()->latest('updated_at')->with('user')->get();
    }
}