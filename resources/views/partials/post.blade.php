<div class="album text-muted">
    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
                <div class="card">
                    <a href="/posts_detail/{{ $post->id }}" class="">
                        <img src="https://www.tourmyindia.com/states/jammu-kashmir/images/magnificent1.jpg" alt="" class=""/>
                        <p class="card-text">
                            {{ $post->title }}
                        </p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>


