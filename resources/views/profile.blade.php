@extends('layouts.master')

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
                                    </tr>
                                </thead>
                                <tbody>
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
                                                    {{-- {{ $post->category }} --}}
                                                </td>
                                                <td>
                                                    <a href="#">
                                                        Edit post
                                                    </a> 
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection