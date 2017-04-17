@extends('admin.app')
@section('content-header')
    <h1>
        用户管理
        <small>注册会员</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">用户管理 - 注册会员</li>
    </ol>
@stop

@section('content')
    <h2 class="page-header">注册会员</h2>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">会员列表</h3>
            <div class="box-tools">
                <form action="" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control input-sm pull-right" name="s_title"
                               style="width: 150px;" placeholder="搜索会员">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-hover table-bordered">
                <tbody>
                <!--tr-th start-->
                <tr>
                    <th>操作</th>
                    <th>昵称</th>
                    <th>邮箱</th>
                    <th>是否验证</th>
                    <th>发布时间</th>
                    <th>更新时间</th>
                </tr>
                <!--tr-th end-->
                @foreach($users as $user)
                    <tr>
                        <td>
                            <a style="font-size: 16px" href="#"><i class="fa fa-fw fa-pencil" title="修改"></i></a>
                            <a style="font-size: 16px;color: #dd4b39;" href="#"><i class="fa fa-fw fa-trash-o"
                                                                                   title="删除"></i></a>
                        </td>
                        <td class="text-muted">{{$user->name}}</td>
                        <td class="text-muted">{{$user->email}}</td>
                        <td class="text-muted">{{$user->is_active}}</td>
                        <td class="text-navy">{{$user->created_at}}</td>
                        <td class="text-navy">{{$user->updated_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

