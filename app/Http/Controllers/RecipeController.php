<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;
use App\Http\Requests\RecipeRequest;

class RecipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::with('usersFavourite')->get();
        
        return view('recipe.list', compact('recipes'));
    }

    public function favourites()
    {
        $recipes = Recipe::whereHas('usersFavourite', function($favourite){
            return $favourite->where('user_id', \Auth::user()->id);
        })
        ->get();

        return view('recipe.list', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RecipeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecipeRequest $request)
    {
        $recipe = $request->all();
        $recipe['user_id'] = $request->user()->id;
        $recipe['published_at'] = \Carbon\Carbon::now();
        Recipe::create($recipe);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return view('recipe.view', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return back();
    }

    public function addToFavourites(Request $request, Recipe $recipe)
    {
        $request->user()->favouriteRecipes()->attach($recipe);

        return back();
    }

    public function removeFromFavourites(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);
        $request->user()->favouriteRecipes()->detach($recipe);

        return back();
    }
}
