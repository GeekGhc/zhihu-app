@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="profile-card">
                        <div class="userCover-panel">
                            <div class="userCover">
                                <img class="userCover-img" src="{{url('/images/pattern.jpeg')}}" alt="">
                                <div class="userCover-link"></div>
                            </div>
                        </div>
                        <div class="header-wrapper">
                            <div class="header-wrapper-main">
                                <div class="user-profile-avatar">
                                    <div class="userAvatar">
                                        <img src="{{$user->avatar}}" alt="">
                                    </div>
                                </div>
                                <div class="profile-header-content">
                                    <div class="profile-header-conHeader">
                                        <h1 class="profile-user-name"><span>{{$user->name}}</span></h1>
                                    </div>
                                    <div class="profile-header-conBody">
                                        <div class="ProfileHeader-info">
                                            <div class="ProfileHeader-infoItem">
                                                <i class="fa fa-location-arrow"></i>{{$user->setting['city']}}
                                            </div>
                                            <div class="ProfileHeader-infoItem">
                                                <i class="fa fa-github"></i>{{$user->setting['github']}}
                                            </div>
                                            <div class="ProfileHeader-infoItem">
                                                <i class="fa fa-link"></i><a href="{{$user->setting['site']}}"
                                                                             target="_blank">{{$user->setting['site']}}</a>
                                            </div>
                                            <div class="ProfileHeader-infoItem">
                                                <i class="fa fa-cloud"></i>{{$user->setting['bio']}}
                                            </div>
                                        </div>
                                    </div>
                                    @if(Auth::id()===$user->id)
                                        <a href="/setting" class="ui button inverted blue edit-profile-user">编辑个人资料</a>
                                    @else
                                        <div class="edit-profile-user">
                                            <user-follow-button user="{{$user->id}}"></user-follow-button>
                                            <send-message user="{{$user->id}}"></send-message>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="profile-main">
                    <div class="profileMain">
                        @yield('profile-content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
