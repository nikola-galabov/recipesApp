<form action="/comments" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">

    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
        <textarea name="content" id="content" class="form-control"></textarea>
        @if ($errors->has('content'))
            <span class="help-block">
                <strong>{{ $errors->first('content') }}</strong>
            </span>
        @endif
    </div>

    <button class="btn btn-primary">Add Comment</button>
</form>