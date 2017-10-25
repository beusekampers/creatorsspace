<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\LikedPost;

class LikedController extends Controller
{
    public function store(Post $post)
    {

        LikedPost::firstOrNew([
            'user_id' => auth()->id(),
            'post_id' => $post->id
        ])->toggle();

        return back();
    }
}
