<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use SoftDeletes;
    
    protected $dates = [ 
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'content',
        'image_url',
        'user_id',
    ];

    public function author() 
    {
        return $this->belongsTo('users', 'user_id');
    }

    public function usersFavourite()
    {
        return $this->belongsToMany('App\User', 'user_favourites', 'recipe_id', 'user_id');
    }

    public function isUserFavourite($userId = null) 
    {
        $userId = $userId ?? \Auth::user()->id;
        
        return is_null($this->usersFavourite->where('id', $userId)->first());
    }
}
