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
    <div class="panel-footer">
        <div class="clearfix">
            <button class="toggle-comments pull-left btn-link">
                {{ $recipe->comments->count() }}
                <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
            </button>

            <i class="pull-right">Last Modified: {{ $recipe->updated_at->toDateString() }}</i>
        </div>

        {{-- Comments --}}
        <div class="comments hidden">
            @if($recipe->comments->count())
                <div class="comment">
                    <h4>Comments:</h4>
                    <div class="list-group">
                        @foreach($recipe->comments as $comment)
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="/avatar.jpeg" alt="usr-avatar">
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">
                                        <div class="row">
                                            <div class="col-md-12 clearfix">
                                                <span class="pull-left">{{ $comment->user->name }}</span>
                                                <span class="pull-right">{{ $comment->updated_at->toDateTimeString() }}</span>
                                            </div>
                                        </div>
                                    </h5>
                                    <hr>
                                    {{ $comment->content }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            @include('comment._form')
        </div>
    </div>
</div>