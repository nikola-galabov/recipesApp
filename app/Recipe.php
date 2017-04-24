<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $dates = [ 
        'published_at',
    ];

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image_url',
        'user_id',
        'published_at',
    ];

    public function author() 
    {
        return $this->belongsTo('users', 'user_id');
    }
}
