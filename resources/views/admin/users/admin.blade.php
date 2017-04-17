@extends('admin.app')
@section('content-header')
    <h1>
        用户管理
        <small>个人资料</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="{{url('/admin/info/index')}}">用户管理</a></li>
        <li class="active"><a href="">个人资料</a></li>
    </ol>
@stop

@section('content')
    <h2 class="page-header">个人资料</h2>
    <form method="POST" action="/admin/profile/update" accept-charset="utf-8">
        {!! csrf_field() !!}
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">基本资料</a></li>
                <li><a href="#tab_2" data-toggle="tab" aria-expanded="true">修改密码</a></li>
            </ul>

            <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="form-group">
                            <label>昵称
                                <small class="text-red">*</small>
                            </label>
                            <input value="{{$user->name}}" required="required" type="text" class="form-control"
                                   name="name" autocomplete="off"
                                   maxlength="80">
                        </div>
                        <div class="form-group">
                            <label>邮箱
                                <small class="text-red">*</small>
                            </label>
                            <input value="{{$user->email}}" required="required" type="text" class="form-control"
                                   name="email" autocomplete="off"
                                   maxlength="80">
                        </div>
                    </div>
                    <div class="tab-pane " id="tab_2">
                        <div class="form-group">
                            <label>新密码
                                <small class="text-red">*</small>
                            </label>
                            <input required="required" type="password" class="form-control" name="password"
                                   autocomplete="off"
                                   maxlength="80">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">确认修改</button>
            </div>
        </div>
    </form>
@stop

