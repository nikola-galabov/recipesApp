<div id="recipes-list">
    @foreach($recipes as $recipe)
        @if(!is_null($recipe))
            <div class="panel panel-default">
                <div class="panel-heading">{{$recipe->title}}</div>
                <div class="panel-body">
                    {{ $recipe->content }}
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                @if($recipe->isUserFavourite())
                                    @include('recipe.addToFavouritesForm')
                                @else
                                    @include('recipe.removeFromFavouritesForm')
                                @endif
                            </div>
                            <div class="pull-right">
                                <form action="/recipes/{{ $recipe->id }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>