@extends('layouts.app')
@section('header-css')
    <style>
        body{
            background: #fff !important;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="followMsg" role="tab"
                                                              data-toggle="tab">消息通知</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="privateMsg" role="tab" data-toggle="tab">私信通知</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="followMsg">
                        @foreach($user->notifications as $notification)
                            @include('notifications.'.snake_case(class_basename($notification->type)))
                        @endforeach
                    </div>
                    <div role="tabpanel" class="tab-pane" id="privateMsg">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
