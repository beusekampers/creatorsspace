@extends('layouts.master')
@section('title', 'Detail Page')

@section('content')
    <div class="wrapper detail clearfix">
        <div class="post-detail">
            <div class="col-md-6">
                <div class="post-image">
                    <img src="/uploads/posts/{{ $post->post_image }}" alt="" class=""/>
                </div>
            </div>
            <div class="col-md-6">
                <h1>{{ $post->title }}</h1>
                <p>{{ $post->description }}</p>
                <p>{{ $post->category->name }}</p>
                <p>{{ $post->user->name }}</p>
            </div>
        </div>
        <div class="comments clearfix">
            <div class="col-md-12">
                <h1>
                    Comments
                </h1>
            </div>
            <div class="col-md-12">
                <ul class="collection">
                    @foreach ($post->comments as $comment)
                        <li class="collection-item">
                            <label>
                                {{ $comment->created_at->diffForHumans() }} - 
                            </label>
                            {{ $comment->body }}

                            <div class="chip right">
                                <img src="/uploads/avatars/{{ $comment->user->profile_picture }}" alt="User"/>
                                {{ $comment->user->name }}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-12">
                <div class="card-block">
                    <form action="/posts/{{ $post->id }}/comment" method="POST">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <textarea name="body" id="" placeholder="Your comment here." class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <a href="/">Terug</a> --}}

@endsection