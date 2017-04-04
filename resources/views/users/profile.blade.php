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
                            @yield('profile-content')
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
