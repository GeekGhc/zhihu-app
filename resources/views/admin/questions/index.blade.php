@extends('admin.app')
@section('content-header')
    <h1>
        内容管理
        <small>文章</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li>内容管理</li>
        <li class="active">问题</li>
    </ol>
@stop

@section('content')
    <a href="{{url('admin/question/create')}}" class="btn btn-primary margin-bottom"><i class="fa fa-paint-brush" style="margin-right: 6px"></i>撰写新文章</a>
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
                    <th>浏览次数</th>
                    <th>发布时间</th>
                    <th>更新时间</th>
                </tr>
                </thead>
                <!--tr-th end-->

                <tbody>
                <tr>
                    <td>
                        <a style="font-size: 16px" href="#"><i class="fa fa-fw fa-pencil" title="修改"></i></a>
                        <a style="font-size: 16px;color: #dd4b39;" href="#"><i class="fa fa-fw fa-trash-o" title="删除"></i></a>
                    </td>
                    <td class="text-muted">vuelidate结合Laravel后端数据注册验证</td>
                    <td class="text-green">JellyBean</td>
                    <td class="text-navy">23</td>
                    <td class="text-navy">2017-02-12 08:12:34</td>
                    <td class="text-navy">2017-02-12 08:12:34</td>
                </tr>

                <tr>
                    <td>
                        <a style="font-size: 16px" href="#"><i class="fa fa-fw fa-pencil" title="修改"></i></a>
                        <a style="font-size: 16px;color: #dd4b39;" href="#"><i class="fa fa-fw fa-trash-o" title="删除"></i></a>
                    </td>
                    <td class="text-muted">vue-router处理前端路由</td>
                    <td class="text-green">JellyBean</td>
                    <td class="text-navy">45</td>
                    <td class="text-navy">2017-02-13 08:12:34</td>
                    <td class="text-navy">2017-02-13 08:12:34</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop

