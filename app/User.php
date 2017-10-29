<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;

class User extends Authenticatable
{
    use Notifiable;

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function liked()
    {
        return $this->belongsToMany('App\Post', 'liked_posts')
            ->withTimestamps();
    }

    public function likedFor(Post $post)
    {
        return $post->liked->contains('user_id', $this->id);
    }

    public function is_admin()
    {
        if($this->admin){
            return true;
        }else{
            return false;
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'personal_text',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
