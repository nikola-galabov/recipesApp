<form method="POST" action="/recipes/{{$recipe->id}}/removeFromFavourites">
    {{ csrf_field() }}
    <button class="btn btn-primary">
        Remove From Favourites
    </button>
</form>