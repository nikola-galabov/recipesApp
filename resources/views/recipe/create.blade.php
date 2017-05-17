@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Create Recipe</div>
        <div class="panel-body">
            <form class="form" role="form" method="POST" action="/recipes">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title" class="control-label">Title:</label>
                    <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                    <label for="image" class="control-label">Image:</label>
                    <input id="image" type="file" class="form-control" name="image" value="{{ old('image') }}">

                    @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                    <label for="content" class="control-label">Content:</label>
                    <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
                    
                    @if ($errors->has('content'))
                        <span class="help-block">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group clearfix">
                    <button type="submit" class="btn btn-primary pull-right">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
