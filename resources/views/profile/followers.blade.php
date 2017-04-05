@extends('users.profile')
@section('profile-content')
    <div class="profileMain-header">
        <ul class="profileMain-tabs">
            <li class="item"><a href="{{route('questions',['userName'=>$user->name])}}">问题</a></li>
            <li class="item"><a href="{{route('answers',['userName'=>$user->name])}}">回答</a></li>
            <li class="item"><a href="{{route('like',['userName'=>$user->name])}}">收藏</a></li>
            <li class="item"><a href="{{route('following',['userName'=>$user->name])}}">关注的人</a></li>
            <li class="item"><a class="active" href="{{route('followers',['userName'=>$user->name])}}">我的粉丝</a></li>
        </ul>
    </div>
    <div class="profileMain-content">
        @foreach($followers as $follower)
            <div class="list-item">
                <div class="col-md-10">
                    <img class="avatar" src="{{$follower->avatar}}" alt="">
                    <a class="name" href="/people/{{$follower->name}}">{{$follower->name}}</a>
                </div>
                <div class="col-md-2">
                    <div class="meta-info">{{$follower->followers_count}}人关注</div>
                </div>
            </div>
        @endforeach
    </div>
@endsection