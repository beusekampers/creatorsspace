<div class="album text-muted clearfix">
    @foreach ($posts as $post)
        <div class="card">
            <a href="/posts_detail/{{ $post->id }}" class="">
                <img src="/uploads/posts/{{ $post->post_image }}" alt="" class=""/>
                <div class="col-md-9">
                    <p class="card-text">
                        {{ $post->title }}
                    </p>
                    <span class="description">
                        {{ $post->description }}
                    </span>
                </div>
                {{-- <div class="col-md-3">
                    <div class="avatar">
                        <img src="/uploads/avatars/{{ Auth::user()->profile_picture }}" alt="User"/>
                    </div>
                </div> --}}
            </a>
        </div>
    @endforeach
</div>


