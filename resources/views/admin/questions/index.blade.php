@extends('admin.app')
@section('content-header')
    <h1>
        内容管理
        <small>问题</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li>内容管理</li>
        <li class="active">问题</li>
    </ol>
@stop

@section('content')
    <a href="{{url('admin/question/create')}}" class="btn btn-primary margin-bottom"><i class="fa fa-paint-brush"
                                                                                        style="margin-right: 6px"></i>撰写新文章</a>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">问题列表</h3>
            <div class="box-tools">
                <form action="" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control input-sm pull-right" name="s_title"
                               style="width: 150px;" placeholder="搜问题标题">
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
                    <th>标题</th>
                    <th>作者</th>
                    <th>关注人数</th>
                    <th>发布时间</th>
                    <th>更新时间</th>
                </tr>
                </thead>
                <!--tr-th end-->

                <tbody>
                @foreach($questions as $question)
                    <tr>
                        <td>
                            <a style="font-size: 16px;padding: 4px" href="/admin/question/edit/{{$question->id}}" class="ui button"><i class="fa fa-fw fa-pencil" title="修改"></i></a>
                            <form action="/admin/question/{{$question->id}}" method="POST" class="delete-form action-btn" style="display: inline-block;cursor: pointer">
                                {{method_field('DELETE')}}
                                {!! csrf_field() !!}
                                <button style="font-size: 16px;color: #dd4b39;padding: 4px;" class="ui button">
                                    <i class="fa fa-fw fa-trash-o" title="删除"></i>
                                </button>
                            </form>
                        </td>
                        <td class="text-muted">{{$question->title}}</td>
                        <td class="text-green">{{$question->user->name}}</td>
                        <td class="text-navy">{{$question->followers_count}}</td>
                        <td class="text-navy">{{$question->created_at}}4</td>
                        <td class="text-navy">{{$question->updated_at}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@stop

