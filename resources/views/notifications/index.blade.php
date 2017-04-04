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
                <ul class="nav nav-tabs nav-message-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#commonMsg" aria-controls="commonMsg" role="tab" data-toggle="tab">消息通知</a>
                    </li>
                    <li role="presentation">
                        <a href="#privateMsg" aria-controls="privateMsg" role="tab" data-toggle="tab">私信列表</a>
                    </li>
                    <a href="/messages/read" class="ui button teal pull-right">全部标记为已读</a>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="commonMsg">
                        @foreach($user->notifications as $notification)
                            @include('notifications.'.snake_case(class_basename($notification->type)))
                        @endforeach
                    </div>
                    <div role="tabpanel" class="tab-pane" id="privateMsg">
                        @foreach($messages as $message)
                            <div class="media {{$message->shouldAddUnreadClass()?'unread':''}}">
                                <div class="media-left">
                                    <a href="#">
                                        @if(Auth::id() === $message->to_user_id)
                                            <img src="{{ $message->fromUser->avatar }}" style="width: 40px;height: 40px;">
                                        @else
                                            <img src="{{ $message->toUser->avatar }}" style="width: 40px;height: 40px;">
                                        @endif
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="#">
                                            @if(Auth::id() === $message->to_user_id)
                                                {{ $message->fromUser->name }}
                                            @else
                                                {{ $message->toUser->name }}
                                            @endif
                                        </a>
                                        @if($message->shouldAddUnreadClass())
                                        <div class="ui red label pull-right">{{$message->unReadCount()}}</div>
                                        @endif
                                    </h4>
                                    <p><a href="/inbox/{{$message->dialog_id}}">
                                            {{ $message->body }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
