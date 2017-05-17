<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/recipes/favourites', 'RecipeController@favourites');
Route::get('/recipes/search', function (Request $request) {
    dd($request->user());
    $recipes = \App\Recipe::with('usersFavourite')
        ->where('title', 'like', '%' . $request->input('search'). '%')
        ->limit(50)
        ->get();

    return view('recipe._recipe-list', compact('recipes'));
});

Route::resource('/recipes', 'RecipeController');

Route::group(['prefix' => 'users'], function() {
    Route::get('/{id}/edit', 'UserController@edit');
});

Route::post('/recipes/{recipe}/addToFavourites', 'RecipeController@addToFavourites');
Route::post('/recipes/{recipe}/removeFromFavourites', 'RecipeController@removeFromFavourites');