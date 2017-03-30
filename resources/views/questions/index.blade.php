@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($questions as $question)
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
                @endforeach
            </div>
        </div>
    </div>
@endsection
