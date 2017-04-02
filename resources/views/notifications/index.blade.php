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
                    <li role="presentation" class="active">
                        <a href="#commonMsg" aria-controls="commonMsg" role="tab" data-toggle="tab">消息通知</a>
                    </li>
                    <li role="presentation">
                        <a href="#privateMsg" aria-controls="privateMsg" role="tab" data-toggle="tab">私信通知</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="commonMsg">
                        @foreach($user->notifications as $notification)
                            @include('notifications.'.snake_case(class_basename($notification->type)))
                        @endforeach
                    </div>
                    <div role="tabpanel" class="tab-pane" id="privateMsg">
                        @foreach($messages as $key=>$messageGroup)
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        @if(Auth::id() === $key)
                                            <img src="{{ $messageGroup->first()->fromUser->avatar }}" style="width: 40px;height: 40px;">
                                        @else
                                            <img src="{{ $messageGroup->first()->toUser->avatar }}" style="width: 40px;height: 40px;">
                                        @endif
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="#">
                                            @if(Auth::id() === $key)
                                                {{ $messageGroup->first()->fromUser->name }}
                                            @else
                                                {{ $messageGroup->first()->toUser->name }}
                                            @endif
                                        </a>
                                    </h4>
                                    <p><a href="/inbox/{{$messageGroup->last()->dialog_id}}">
                                            {{ $messageGroup->last()->body }}
                                        </a></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
