@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$recipe->title}}</div>
                    <div class="panel-body">
                        {{ $recipe->content }}
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection