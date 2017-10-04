@extends('layouts.master')
@section('title', 'Profile')

@section('content')
    @if(Session::has('flash_message'))
        <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
    @endif
    <div class="wrapper profile">
        <div class="row">
            <div class="col-md-12">
                <h1>
                    {{ Auth::user()->name }}'s profile
                </h1>
            </div>

            <div class="col-md-12 profile">
                <div class="profile-image clearfix">
                    <div class="col-md-12">
                        <div class="image">
                            <img src="/uploads/avatars/{{ Auth::user()->profile_picture }}"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <form action="/profile" class="clearfix" enctype="multipart/form-data" method="POST">
                            {{ csrf_field() }}

                            <input type="file" name="profile_picture" class="btn btn-default btn-file"/>
                            <input type="submit" class="btn btn-primary"/>
                        </form>
                    </div>
                </div> 
            </div>
        </div>

        {{-- Uploads overview --}}

        <div class="uploads">
            <div class="row">
                <div class="col-md-12">
                    <h1>
                        Upload overview
                    </h1>
                    <a href=" {{ url('posts/create') }}">
                        Upload new post
                    </a>
                    <div class="upload">
                        <div class="panel panel-default">
                            <!-- Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Post name</th>
                                        <th>Description</th>
                                        <th>Post image</th>
                                        <th>Category</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <th>Active</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @if ($posts) --}}
                                        @foreach ($posts as $post)
                                            @if ($post->user_id == Auth::user()->id)
                                                <tr>
                                                    <td>
                                                        #
                                                    </td>
                                                    <td>
                                                        {{ $post->title }}
                                                    </td>
                                                    <td>
                                                        {{ $post->description }}
                                                    </td>
                                                    <td>
                                                        <img src="/uploads/posts/{{ $post->post_image }}" alt="{{ $post->name }}"/>
                                                    </td>
                                                    <td>
                                                        {{ $post->category->name }}
                                                    </td>
                                                    <td>
                                                        <a href="/posts/edit/{{ $post->id }}" class="btn">
                                                            Edit post
                                                        </a> 
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('posts.delete', ['post_id' => $post->id]) }}" class="btn red">
                                                            Delete
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <form method="POST" action="/posts/{{ $post->id }}" >
                                                            {{ csrf_field() }}
                                                            <select name="active" id="active" onchange="this.form.submit()">
                                                                <option value="1" @if($post->active == 1) selected @endif >On</option>
                                                                <option value="0" @if($post->active == 0) selected @endif >Off</option>
                                                            </select>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    {{-- @endif --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection