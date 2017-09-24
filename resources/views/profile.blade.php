@extends('layouts.master')

@section('content')
    <div class="wrapper profile">
        <div class="row">
            <div class="col-md-12">
                <h1>
                    {{ $user->name }}'s profile
                </h1>
            </div>

            <div class="col-md-12 profile">
                <div class="profile-image clearfix">
                    <div class="col-md-6">
                        <div class="image">
                            <img src="/uploads/avatars/{{ Auth::user()->profile_picture }}"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form action="/profile" enctype="multipart/form-data" method="POST">
                            {{ csrf_field() }}

                            <input type="file" name="profile_picture" class="btn btn-default btn-lg btn-file"/>
                            <input type="submit" class="btn btn-outline-primary btn-lg"/>
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

                    <div class="upload">
                        {{-- @foreach ($posts as $post)
                            @if ($post->user_id == $user->id)
                                {{ $post->title }}
                            @endif
                        @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection