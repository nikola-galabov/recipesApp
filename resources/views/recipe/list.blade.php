@extends('layouts.app')

@section('content')
    <form id="recipes-search" action="/api/recepies" method="get">
        <div class="form-group">
            <input class="form-control" name="search" type="text" placeholder="Search...">
        </div>
    </form>
    @include('recipe._recipe-list')
@endsection
