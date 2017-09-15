@extends('/partials/headernav')

<a>
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->description }}</p>
    
    <a href="/">Terug</a>
</body>
</html>

@extends('/partials/footer')