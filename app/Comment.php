<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'content',
        'user_id',
        'recipe_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }
}
