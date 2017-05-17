<form method="POST" action="/recipes/{{$recipe->id}}/addToFavourites">
    {{ csrf_field() }}
    <button class="btn btn-link txt-success">
        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
    </button>
</form>