@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h4 class="ui dividing header"> <i class="fa fa-list fa-icon-lg"></i>最新动态</h4>

                @foreach($questions as $question)
                <div class="feed-list">
                    <div class="feed-item">
                        <div class="feed-item-inner">
                            <div class="feed-avatar">
                                <a href="/people/{{$question->user->name}}"><img src="{{$question->user->avatar}}" alt=""></a>
                                @if($question->is_first == "T")
                                <span class="badge bell-badge top-question"><i class="fa fa-thumb-tack"></i></span>
                                @endif
                            </div>
                            <div class="feed-main">
                                <div class="feed-content">
                                    <h4 class="feed-title">
                                        <a href="/questions/{{$question->id}}">{{$question->title}}</a>
                                    </h4>
                                </div>
                                <div class="feed-author">
                                    <span>{{$question->user->name}}</span>发表于{{$question->created_at->diffForHumans()}}
                                </div>
                                <div class="feed-item-body">
                                    {{mb_substr(strip_tags($question->body),0,66,"utf-8")}}
                                </div>
                                <div class="feed-meta">
                                    <div class="feed-meta-panel">
                                        <a href="#" class="meta-item"><i class="fa fa-comment fa-icon-sm"></i>{{$question->answers_count}}条回答</a>
                                        <a href="#" class="meta-item"><i class="fa fa-star fa-icon-sm"></i>{{$question->followers_count}}人关注</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
