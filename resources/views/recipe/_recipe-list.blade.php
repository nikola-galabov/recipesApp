<div id="recipes-list">
    @foreach($recipes as $recipe)
        @include('recipe._recipe')
    @endforeach
</div>