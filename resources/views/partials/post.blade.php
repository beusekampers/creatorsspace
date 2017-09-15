@foreach($posts as $post)
    <a href="/posts_detail/{{ $post->id }}">
        {{ $post->title }}
    </a>
@endforeach


