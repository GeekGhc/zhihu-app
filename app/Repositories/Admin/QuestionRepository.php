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

    //创建问题
    public function create(array $attributes)
    {
        return Question::create($attributes);
    }

    //更新问题的标签
    public function normalizeTopics(array $topics)
    {
        return collect($topics)->map(function ($topic) {
            if (is_numeric($topic)) {
                Topic::find($topic)->increment('questions_count');
                return (int)$topic;
            }
            $newTopic = Topic::create(['name' => $topic, 'questions_count' => 1]);
            return $newTopic->id;
        })->toArray();
    }

    //拿到问题的topics和答案
    public function byIdWithTopicsAndAnswers($id)
    {
        return Question::where('id', $id)->with(['topics','answers'])->first();
    }
}