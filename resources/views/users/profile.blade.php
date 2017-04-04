@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="profile-card">
                        <div class="userCover-panel">
                            <div class="userCover">
                                <img class="userCover-img" src="{{url('/images/pattern.png')}}" alt="">
                            </div>
                        </div>
                        <div class="header-wrapper">
                            <div class="header-wrapper-main">
                                <div class="user-profile-avatar">
                                    <div class="userAvatar">
                                        <img src="{{url('/images/avatars/elyse.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="profile-header-content">
                                    <div class="profile-header-conHeader">
                                        <h1 class="profile-user-name"><span>JellyBean</span></h1>
                                    </div>
                                    <div class="profile-header-conBody">
                                        <div class="ProfileHeader-info">
                                            <div class="ProfileHeader-infoItem">
                                                <i class="fa fa-location-arrow"></i>南京
                                            </div>
                                            <div class="ProfileHeader-infoItem">
                                                <i class="fa fa-github"></i>GeekGhc
                                            </div>
                                            <div class="ProfileHeader-infoItem">
                                                <i class="fa fa-link"></i>http://kobeman.com
                                            </div>
                                            <div class="ProfileHeader-infoItem">
                                                <i class="fa fa-cloud"></i>Become A Good Programmer
                                            </div>
                                        </div>
                                    </div>
                                    <a href="/setting" class="ui button inverted blue pull-right">编辑个人资料</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="profile-main">
                        <div class="profileMain">
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
                                        <span>3回答</span>
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
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
