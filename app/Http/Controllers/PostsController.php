<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PostsFromUser;

class PostsController extends Controller
{
    public function index()
    {
        $posts = PostsFromUser::all();

        return view('welcome', compact('posts'));
    }

    public function show(PostsFromUser $post){ // Elequent to -> $posts = WorkFromUser::find($id) <- wildcard;

        return view('posts_detail.show', compact('post'));
    }
}
