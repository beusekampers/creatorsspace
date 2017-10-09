    @extends('layouts.master')

    @section('content')
        <div class="row">
            <div class="col s9">
                <form id="search-bar">
                    <div class="input-field">
                        <input id="search" type="search" placeholder="Search for anything!" required>
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons close-search">close</i>
                    </div>
                </form>
            </div>
            <div class="col s3">
                <!-- Dropdown Trigger -->
                <a class="dropdown-button btn category-btn" href="#" data-activates="dropdown1">
                    Categories
                    {{-- <i class="material-icons">keyboard_arrow_down</i> --}}
                </a>
                <!-- Dropdown Structure -->
                <ul id="dropdown1" class="dropdown-content">
                    <li><a href="{{ url("/") }}">All categories</a></li>
                    @foreach ($categories as $category)
                        <li><a href="{{ route("category", $category->id) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            @include('partials.post')
            {{ $posts->links() }}	
        </div>
    @endsection