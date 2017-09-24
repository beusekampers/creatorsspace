@extends('layouts.master')

@section('content')
    <div class="album text-muted">
        <h1>
            Create a post
        </h1>

        <hr>

        <form method="POST" action="/posts">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">

            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" id="category" name="category"/>
            </div>
            {{-- <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" id="exampleInputFile">
                <p class="help-block">Example block-level help text here.</p>
            </div> --}}
            <button type="submit" class="btn btn-primary">Publish</button>
        </form>
    </div>

@endsection