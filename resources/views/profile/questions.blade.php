@extends('users.profile')
@section('profile-content')
    <div class="profileMain-header">
        <ul class="profileMain-tabs">
            <li class="item"><a class="active" href="#">问题</a></li>
            <li class="item"><a href="#">回答</a></li>
            <li class="item"><a href="#">收藏</a></li>
            <li class="item"><a href="#">关注的人</a></li>
            <li class="item"><a href="#">我的粉丝</a></li>
        </ul>
    </div>
    <div class="profileMain-content">
        @foreach($questions as $question)
            <div class="list-item">
                <div class="col-md-1">
                    @if($question->answers_count>0)
                    <span class="ui label green"> {{$question->answers_count}} 回答</span>
                    @else
                    <span class="ui label yellow"> {{$question->answers_count}} 回答</span>
                    @endif
                </div>
                <div class="col-md-9">
                    <a href="/questions/{{$question->id}}">{{$question->title}}</a>
                </div>
                <div class="col-md-2">
                    <span>{{$question->created_at->format('Y年m月d日')}}</span>
                </div>
            </div>
        @endforeach

    </div>
@endsection