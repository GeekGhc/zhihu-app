@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">个人设置</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/setting') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <label for="city" class="col-md-4 control-label">现居城市</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" name="city" value="{{ user()->setting['city'] }}" required>

                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('site') ? ' has-error' : '' }}">
                                <label for="site" class="col-md-4 control-label">个人站点</label>

                                <div class="col-md-6">
                                    <input id="site" type="text" class="form-control" name="site" value="{{user()->setting['site']}}" required>

                                    @if ($errors->has('site'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('site') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('github') ? ' has-error' : '' }}">
                                <label for="github" class="col-md-4 control-label">Github</label>

                                <div class="col-md-6">
                                    <input id="github" type="text" class="form-control" name="github" value="{{user()->setting['github']}}" required>

                                    @if ($errors->has('github'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('github') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                                <label for="bio" class="col-md-4 control-label">个人简介</label>

                                <div class="col-md-6">
                                    <textarea id="bio" type="text" class="form-control" name="bio" required>{{user()->setting['bio']}}</textarea>

                                    @if ($errors->has('bio'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        更改资料
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
