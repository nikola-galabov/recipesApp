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
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
