    @extends('layouts.master')

    @section('content')
    <div class="container">
        {{-- @include('partials.post') --}}
        @foreach ($posts as $post)
            {{ $post->title }}
        @endforeach

    </div>
    @endsection