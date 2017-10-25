<div class="album text-muted clearfix">
    @foreach ($posts as $post)
        @if ($post->active == 1)
            <div class="card">
                <a href="{{ route("detail", $post->id) }}" class="">
                    <div class="image" style="background-image: url(/uploads/posts/{{ $post->post_image }});">
                    
                    </div>
                    {{-- <img src="/uploads/posts/{{ $post->post_image }}" alt="" class=""/> --}}
                    <div class="col-md-9">
                        <p class="card-text">
                            {{ $post->title }}
                        </p>
                        <p class="description">
                            {{ $post->description }}
                        </p>
                        <p>  
                            <b> Likes: </b>{{ $post->liked->count() }}
                        </p>
                    </div>
                    <div class="col-md-3">
                        <div class="avatar">
                            <img src="/uploads/avatars/{{ $post->user->profile_picture }}" alt="User"/>
                        </div>
                    </div>
                </a>
            </div>
        @else
        
        @endif
    @endforeach
</div>


