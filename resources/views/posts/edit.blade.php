@extends('layouts/master')

@section('content')
    <div class="wrapper create z-depth-3 clearfix edit">
        <h2>
            Update - {{ $post->title }}
        </h2>

        <hr>

        <div class="image" style="background-image: url(/uploads/posts/{{ $post->post_image }});"></div>

        <form method="POST" action="/posts/edit/{{ $post->id }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" value="{{ $post->title }}" class="form-control" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ $post->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

            </div>

            <button type="submit" class="btn btn-primary">Publish</button>
        </form>
    </div>
@endsection