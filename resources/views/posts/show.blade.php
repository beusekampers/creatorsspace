@extends('layouts.master')
@section('title', 'Detail Page')

@section('content')
    <div class="wrapper detail clearfix">
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
    {{-- <a href="/">Terug</a> --}}

@endsection