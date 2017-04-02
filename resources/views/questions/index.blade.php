@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {{--@foreach($questions as $question)
                    <div class="media">
                        <div class="media-left">
                            <a>
                                <img width="48" src="{{$question->user->avatar}}" alt="{{$question->user->name}}">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <a href="/questions/{{$question->id}}">{{$question->title}}</a>
                            </h4>
                        </div>
                    </div>
                @endforeach--}}
                <h4 class="ui dividing header"> <i class="fa fa-list fa-icon-lg"></i>最新动态</h4>
                <div class="feed-list">
                    <div class="feed-item">
                        <div class="feed-item-inner">
                            <div class="feed-avatar">
                                <a href=""><img src="/images/avatars/elyse.png" alt=""></a>
                            </div>
                            <div class="feed-main">
                                <div class="feed-content">
                                    <h4 class="feed-title">
                                        <a href="">平板电脑能取代笔记本电脑吗？</a>
                                    </h4>
                                </div>
                                <div class="feed-item-body">
                                    又重又宽的平板电脑正在被大屏手机取代，而笔记本和台式机虽然被移动端挤压但还是活得好好的。
                                    当初我买sp3的初衷是作为平板电脑，兼顾笔记本的用途，但一年多用下来还是作为笔记本的形态使用的比较多，当平板用手酸
                                </div>
                                <div class="feed-meta">
                                    <div class="feed-meta-panel">
                                        <a href="" class="meta-item"><i class="fa fa-comment fa-icon-sm"></i>12条评论</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
