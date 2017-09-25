@extends('layouts.master')

@section('content')
    <div class="album text-muted">
        <h1>
            Create a post
        </h1>

        <hr>

        <form method="POST" action="/posts" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" id="category" name="category"/>
                {{-- <select>
                    <option value="">Test</option>
                </select> --}}

            </div>

            <div class="form-group">
                <label for="post_image">Artwork</label>
                <input type="file" name="post_image" class="btn btn-default btn-file"/>
            </div>

            <button type="submit" class="btn btn-primary">Publish</button>
        </form>
    </div>

@endsection