<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use Image;

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

    public function store(Request $request)
    {
        // dd(request()->all());, dd(request(['title', 'body'])) -> Laat een array zien met de ingevulde data
        if($request->hasFile('post_image')){
    		$post_image = $request->file('post_image');
    		$filename = time() . '.' . $post_image->getClientOriginalExtension();
    		Image::make($post_image)->save( public_path('/uploads/posts/' . $filename ) );
    	}

        // Create a new post using request data
        $post = new Post;

        $post->title = request('title');
        $post->user_id = Auth::user()->id;
        $post->category = request('category');
        $post->post_image = $filename;
        $post->description = request('description');
        
        // Save it to the database
        $post->save();

        // Redirect to the homepage
        return redirect('/');
    }
}
