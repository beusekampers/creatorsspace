    @extends('layouts.master')

    @section('content')
        <div class="row">
            <div class="col s9">
                <div id="search">
                    <ais-index app-id="{{ config('scout.algolia.id') }}"
                            api-key="{{ env('ALGOLIA_SEARCH') }}"
                            index-name="posts">
                        
                        <ais-input id="input" placeholder="Search posts..."></ais-input>

                        <div id="resultWrap" style="display:none;">
                            <ul class="results">
                            <ais-results>
                                <template scope="{ result }">
                                    {{-- @foreach ($posts as $post) --}}
                                    <li class="result">
                                        <p> 
                                            @{{ result.title }} 
                                        </p>
                                        <p>
                                            @{{ result.description }}
                                        </p>   
                                    </li>
                                    {{-- @endforeach --}}
                                </template>
                            </ais-results>
                            <ais-no-results>
                                <template scope="props">
                                    No products found for <b>@{{ props.query }}</b>
                                </template>
                            </ais-no-results>
                            </ul>
                        </div>

                    </ais-index>
                </div>
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