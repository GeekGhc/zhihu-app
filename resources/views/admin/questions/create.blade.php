@extends('admin.app')
@section('other-css')
    <link rel="stylesheet" href="/dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
@endsection
@section('content-header')
    <h1>
        内容管理
        <small>问题</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="{{url('/admin/article/index')}}">内容管理</a></li>
        <li class="active">创建问题</li>
    </ol>
@stop

@section('content')
    <h2 class="page-header">创建问题</h2>
    <div class="box box-primary">
        <form method="POST" action="#" accept-charset="utf-8">
            {!! csrf_field() !!}
            <div class="nav-tabs-custom">
                <div class="tab-content">

                    <div class="tab-pane active">
                        <div class="form-group">
                            <label>标题
                                <small class="text-red">*</small>
                            </label>
                            <input required="required" type="text" class="form-control" name="title" autocomplete="off"
                                   placeholder="问题标题" maxlength="80">
                        </div>
                        <div class="form-group">
                            <label>作者
                                <small class="text-red">*</small>
                            </label>
                            <input required="required" type="text" class="form-control" name="author" autocomplete="off"
                                   placeholder="问题作者名" maxlength="80">
                        </div>
                        <div class="form-group">
                            <label>标签
                                <small class="text-red">*</small>
                            </label>
                            <!-- select -->
                            <div class="form-group">
                                <select class="form-control">
                                    <option>PHP</option>
                                    <option>Laravel</option>
                                    <option>Python</option>
                                    <option>VueJs</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>是否置顶
                                <small class="text-red">*</small>
                            </label>
                            <select class="js-example-placeholder-single form-control">
                                <option value=""></option>
                                <option value="1">是</option>
                                <option value="2">否</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>正文(支持Markdown语法)
                                <small class="text-red">*</small>
                            </label>
                                <textarea class="textarea" placeholder="Place some text here"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">发布文章</button>

                </div>
            </div>
        </form>
    </div>
@stop

@section('other-js')
    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <script src="/dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script>
        $(function () {
            //bootstrap WYSIHTML5 - text editor
            $(".textarea").wysihtml5();
        });
    </script>
@endsection

