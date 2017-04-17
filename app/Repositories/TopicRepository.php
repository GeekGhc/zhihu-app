<?php


namespace App\Repositories;


use App\Topic;
use Illuminate\Http\Request;

class TopicRepository
{
    protected $topic;


    public function getTopicsForTagging(Request $request)
    {
        $topics = Topic::select(['id', 'name'])
            ->where('name', 'like', '%' . $request
                    ->query('q') . '%')->get();
        return $topics;
    }

    public function getTopicsFeed()
    {
        return Topic::all();
    }
}