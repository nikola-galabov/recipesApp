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

Route::get('/', 'RecipeController@index');

Auth::routes();

Route::get('/recipes/favourites', 'RecipeController@favourites');
Route::get('/recipes/search/{term}', 'RecipeController@search' );

Route::resource('/recipes', 'RecipeController');
Route::resource('/comments', 'CommentController');

Route::group(['prefix' => 'users'], function() {
    Route::get('/{id}/edit', 'UserController@edit');
});

Route::post('/recipes/{recipe}/addToFavourites', 'RecipeController@addToFavourites');
Route::post('/recipes/{recipe}/removeFromFavourites', 'RecipeController@removeFromFavourites');