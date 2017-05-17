@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form id="recipes-search" action="/api/recepies" method="get">
                    <div class="form-group">
                        <input class="form-control" name="search" type="text" placeholder="Search...">
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div id="recipes-list" class="col-md-8 col-md-offset-2">
                @include('recipe._recipe-list')
            </div>
        </div>
    </div> 
@endsection