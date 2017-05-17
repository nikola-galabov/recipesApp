@extends('layouts.app')

@section('content')
    <form id="recipes-search" action="/api/recepies" method="get">
        <div class="form-group">
            <input class="form-control" name="search" type="text" placeholder="Search...">
        </div>
    </form>
    @foreach($recipes as $recipe)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <div class="pull-left">
                        @if($recipe->isUserFavourite())
                            @include('recipe.addToFavouritesForm')
                        @else
                            @include('recipe.removeFromFavouritesForm')
                        @endif
                    </div>
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
                <a class="pull-left" href="/recipes/{{ $recipe->id }}#comments">
                    {{ $recipe->comments->count() }}
                    <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                </a>

                <i class="pull-right">Last Modified: {{ $recipe->updated_at->toDateString() }}</i>
            </div>
        </div>
    @endforeach
@endsection
