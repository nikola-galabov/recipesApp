@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{$recipe->title}}</div>
        <div class="panel-body">
            {{ $recipe->content }}
        </div>
    </div>

    @include('comment._form')

    {{-- Comments --}}
    @if($recipe->comments->count())
        <div id="comments">
            <h4>Comments:</h4>
            <div class="list-group">
                @foreach($comments as $comment)
                    <div class="list-group-item">
                        <h5 class="list-group-item-heading">
                            <div class="clearfix">
                                <span class="pull-left">{{ $comment->user->name }}</span>
                                <span class="pull-right">{{ $comment->updated_at }}</span>
                            </div>
                        </h5>
                        <p class="list-group-item-text">
                            {{ $comment->content }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection