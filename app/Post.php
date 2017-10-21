<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Auth;

class Post extends Model
{
    use Searchable;

    public function searchableAs()
    {
        return 'title';
    }

    protected $fillable = [
        'user_id', 'title', 'description', 'post_image',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function addComment($body)
    {
        $user_id = Auth::user()->id;
        
        $this->comments()->create(compact('user_id','body'));
    }
}