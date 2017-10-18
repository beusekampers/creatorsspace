<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use Image;
use App\Category;
// use Laravel\Scout\Searchable;

class PostsController extends Controller
{
    public function index(Request $request, $id = '')
    {   

        $categories = Category::all();

        if($id == '')
            $posts = Post::orderBy('created_at', 'desc')->paginate(12);
        else
            $posts = Post::where('category_id', '=', $id)->orderBy('created_at', 'desc')->paginate(12);   

        return view('welcome', compact('posts', 'categories'));

    }

    public function show(Post $post){ // Elequent to -> $posts = PostsFromUser::find($id) <- wildcard;

        return view('posts.show', compact('post'));
        
    }

    public function create()
    {
        $categories = Category::all();
        
        return view('posts.create', compact('categories'));
    }

    public function edit(Post $post){
        $categories = Category::all();

        return view('posts.edit', compact('post', 'categories'));
    }

    public function status(Request $request, Post $post)
    {
        $post = Post::find($post->id);

        $post->active = request('active');

        $post->save();

        $request->session()->flash('flash_message', 'Yeah you changed the status of your post');

        return redirect('profile');
    }

    public function update(Request $request , Post $post)
    {
        // Get the right post from the Post Model
        $post = Post::find($post->id);

        //Set post object attributes
        $post->title = request('title');
        $post->user_id = Auth::user()->id;
        $post->category_id = request('category_id');
        $post->description = request('description');

        // Update the post
        $post->save();

        $request->session()->flash('flash_message', 'Yeah your post is updated');

        return redirect('profile');
    }

    public function store(Request $request)
    {
        if($request->hasFile('post_image')){
    		$post_image = $request->file('post_image');
    		$filename = time() . '.' . $post_image->getClientOriginalExtension();
    		Image::make($post_image)->save( public_path('/uploads/posts/' . $filename ) );
    	}

        // Create a new post using request data
        $post = new Post;

        $post->title = request('title');
        $post->user_id = Auth::user()->id;
        $post->category_id = request('category_id');
        $post->post_image = $filename;
        $post->description = request('description');
        
        // Save it to the database
        $post->save();

        $request->session()->flash('flash_message', 'Yeah it worked!');

        // Redirect to the homepage
        return redirect('profile');
    }

    public function delete(Request $request,Post $post){

        $post = Post::find($post->id);

        $post->delete();

        $request->session()->flash('flash_message', 'Yeah your post is deleted');

        return redirect('profile');
    }
}
