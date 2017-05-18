<form class="pull-left" method="POST" action="/recipes/{{$recipe->id}}/addToFavourites">
    {{ csrf_field() }}
    <button class="btn-link btn-star pull-left">
        <span class="glyphicon glyphicon-star text-muted" aria-hidden="true"></span>
    </button>
</form>