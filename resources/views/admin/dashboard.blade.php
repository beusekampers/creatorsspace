@extends('layouts.admin')
@section('title', 'Admin dashboard')

@section('admin')
    @if(Session::has('flash_message'))
        <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
    @endif

    <div class="wrapper z-depth-3 profile" style="margin-bottom: 30px;">
        <h4>
            Add category
        </h4>
        <hr>

        <form method="POST" action="/category/post" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Title:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>

    <div class="wrapper z-depth-3 profile">
        <table class="striped">
            <thead>
                <tr>
                    <th>Post name</th>
                    <th>Post image</th>
                    <th>Post link</th>
                    <th>Delete</th>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>
                            {{ $post->title }}
                        </td>
                        <td>
                            <img style="width: 50px;" src="/uploads/posts/{{ $post->post_image }}" alt="{{ $post->name }}"/>
                        </td>
                        <td>
                            <a href="{{ route("detail", $post->id) }}" target="_blank">View post</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.delete', ['post_id' => $post->id]) }}" class="btn red">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection