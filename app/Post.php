<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'title', 'description', 'post_image',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}