@extends('layouts.master')
@section('title', 'Detail Page')

@section('content')
    <div class="wrapper detail clearfix">
        <div class="col-md-6">
            <div class="post-image">
                <img src="https://www.tourmyindia.com/states/jammu-kashmir/images/magnificent1.jpg" alt="" class=""/>
            </div>
        </div>
        <div class="col-md-6">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->description }}</p>
        </div>
    </div>
    {{-- <a href="/">Terug</a> --}}

@endsection