<?php


namespace App\Repositories;


use App\Topic;
use Illuminate\Support\Facades\Request;

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
}