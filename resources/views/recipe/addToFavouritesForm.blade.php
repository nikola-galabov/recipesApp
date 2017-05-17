<form method="POST" action="/recipes/{{$recipe->id}}/addToFavourites">
    {{ csrf_field() }}
    <button class="btn btn-primary">
        Add To Favourites
    </button>
</form>