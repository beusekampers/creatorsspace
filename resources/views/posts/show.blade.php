@extends('layouts.master')
@section('title', 'Detail Page')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->description }}</p>

    <a href="/">Terug</a>

@endsection