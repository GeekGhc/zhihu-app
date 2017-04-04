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
        <div class="list-item">
            <div class="col-md-1">
                <span class="ui label green">3 回答</span>
            </div>
            <div class="col-md-9">
                <a href="#">laravel blade中如何解析vueJs的值</a>
            </div>
            <div class="col-md-2">
                <span>2016年12月18日</span>
            </div>
        </div>
        <div class="list-item">
            <div class="col-md-1">
                <span class="ui label yellow">3 回答</span>
            </div>
            <div class="col-md-9">
                <a href="#">laravel blade中如何解析vueJs的值</a>
            </div>
            <div class="col-md-2">
                <span>2016年12月18日</span>
            </div>
        </div>
        <div class="list-item">
            <div class="col-md-1">
                <span>3回答</span>
            </div>
            <div class="col-md-9">
                <a href="#">laravel blade中如何解析vueJs的值</a>
            </div>
            <div class="col-md-2">
                <span>2016年12月18日</span>
            </div>
        </div>
    </div>
@endsection