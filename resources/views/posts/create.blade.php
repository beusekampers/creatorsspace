@extends('layouts.master')

@section('content')
    <div class="wrapper create z-depth-3 clearfix">
        <h2>
            Create a post
        </h2>

        <hr>

        <form method="POST" action="/posts" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="textarea1">Description</label>
                <textarea name="description" id="textarea1" class="materialize-textarea" required></textarea>
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

            </div>

            <div class="form-group">
                <label for="post_image">Artwork</label>
                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" name="post_image">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" name="post_image" type="text" required>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Publish</button>
        </form>
    </div>

@endsection