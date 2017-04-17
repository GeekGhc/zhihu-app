@extends('admin.app')
@section('content-header')
    <h1>
        内容管理
        <small>标签</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li>内容管理</li>
        <li class="active">标签</li>
    </ol>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">标签列表</h3>
            <div class="box-tools">
                <form action="" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control input-sm pull-right" name="s_title"
                               style="width: 150px;" placeholder="搜标签关键字">
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
                <thead>
                <tr>
                    <th>操作</th>
                    <th>标签名</th>
                    <th>说明</th>
                    <th>发布时间</th>
                    <th>更新时间</th>
                </tr>
                </thead>
                <!--tr-th end-->

                <tbody>
                @foreach($topics as $topic)
                    <tr>
                        <td>
                            <form action="/admin/topic/{{$topic->id}}" method="POST" class="delete-form action-btn" style="display: inline-block;cursor: pointer">
                                {{method_field('DELETE')}}
                                {!! csrf_field() !!}
                                <button style="font-size: 16px;color: #dd4b39;padding: 4px;" class="ui button">
                                    <i class="fa fa-fw fa-trash-o" title="删除"></i>
                                </button>
                            </form>
                        </td>
                        <td class="text-muted">{{$topic->name}}</td>
                        <td class="text-muted">{{$topic->bio}}</td>
                        <td class="text-navy">{{$topic->created_at}}</td>
                        <td class="text-navy">{{$topic->updated_at}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@stop
