@extends('layouts.app')

@section('content')
    @foreach($recipes as $recipe)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a href="/recipes/{{ $recipe->id }}">{{ $recipe->title }}</a>
                </h3>
            </div>
            <div class="panel-body">
                <p>
                    {{ substr($recipe->content, 0, 1000) }}...
                </p>

                <a href="/recipes/{{ $recipe->id }}">Read more</a>
            </div>
            <div class="panel-footer clearfix">
                <a class="pull-left" href="/reciepes/{{ $recipe->id }}">
                    {{ $recipe->comments->count() }}
                    <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                </a>
                
                <i class="pull-right">Last Modified: {{ $recipe->updated_at->toDateString() }}</i>
            </div>
        </div>
    @endforeach
@endsection