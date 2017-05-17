<form action="/comments" method="POST">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
        <label for="content" class="control-label">Comment:</label>
        {{-- <input id="content" type="" class="form-control" name="content" value="{{ old('content') }}"> --}}
        <textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
        @if ($errors->has('content'))
            <span class="help-block">
                <strong>{{ $errors->first('content') }}</strong>
            </span>
        @endif
    </div>
</form>