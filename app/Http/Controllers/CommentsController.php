<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
use Auth;

class CommentsController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $post->addComment(request('body','user_id'));

        $request->session()->flash('flash_message', 'Yeah comment added!');
        
        return back();
    }
}
