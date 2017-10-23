@extends('layouts.master')
@section('title', 'Detail Page')

@section('detail-page')
    <div class="parallax-wrapper">
        <div class="parallax materialboxed" style="background-image: url(/uploads/posts/{{ $post->post_image }});"></div>
        <div class="download">
            <a href="/uploads/posts/{{ $post->post_image }}" download class="btn-floating btn-large waves-effect waves-light">
                <i class="material-icons">cloud_download</i>
            </a>
        </div>
    </div>
    <div class="wrapper z-depth-3 detail clearfix">
        <div class="post-detail">
            <div class="col-md-6">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->description }}</p>
                <p>{{ $post->category->name }}</p>
                <p>{{ $post->user->name }}</p>
            </div>
        </div>
        <div class="comments clearfix">
            <div class="col-md-12">
                <h2>
                    Comments
                </h2>
            </div>
            <div class="col-md-12">
                <ul class="collection">
                    @foreach ($post->comments as $comment)
                        <li class="collection-item">
                            <div class="comment">
                                <label>
                                    {{ $comment->created_at->diffForHumans() }} - 
                                </label>
                                {{ $comment->body }}
                            </div>

                            <div class="user-image chip right">
                                <img src="/uploads/avatars/{{ $comment->user->profile_picture }}" alt="User"/>
                                {{ $comment->user->name }}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            @guest
                <div class="col-md-12">
                    <p>
                        Login in <a href="{{ route('login') }}">here</a> to add a comment
                    </p>
                </div>
            @else
                @if ($qPost >= 5)
                <div class="col-md-12">
                    <div class="card-block">
                        <form action="/posts/{{ $post->id }}/comment" method="POST">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <textarea name="body" id="" placeholder="Place your comment here." class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Publish</button>
                            </div>
                        </form>
                    </div>
                </div>
                @else
                    <div class="col-md-12">
                        <p>
                            You need to upload at least 5 posts to place a comment.
                        </p>
                    </div>
                @endif
            @endguest
        </div>
    </div>
    {{-- <a href="/">Terug</a> --}}

@endsection