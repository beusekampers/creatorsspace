<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('welcome', compact('posts'));
    }

    public function show(Post $post){ // Elequent to -> $posts = PostsFromUser::find($id) <- wildcard;

        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        // dd(request()->all());, dd(request(['title', 'body'])) -> Laat een array zien met de ingevulde data

        // Create a new post using request data
        $post = new Post;

        Post::create([
            'title' => request('title'),
            'user_id' => request('user_id'),
            'category' => request('category'),
            'description' => request('description')
        ]);
        
        // Save it to the database
        $post->save();

        // Redirect to the homepage
        return redirect('/');
    }
}
