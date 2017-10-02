@extends('layouts/master')

@section('content')
    <div class="album text-muted edit">
        <h1>
            Update {{ $post->title }}
        </h1>

        <hr>

        <div class="image" style="background-image: url(/uploads/posts/{{ $post->post_image }});"></div>

        <form method="POST" action="/posts/edit/{{ $post->id }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" placeholder="{{ $post->title }}" class="form-control" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" placeholder="{{ $post->description }}" id="description" class="form-control"></textarea>
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