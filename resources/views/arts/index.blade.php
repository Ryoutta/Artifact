<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ArtLink</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Art Name</h1>
        <a href="/arts/create">create</a>
        <div class='arts'>
            @foreach($arts as $art)
                <div class='art'>
                    <a href="/arts/{{ $art->id }}"><h2 class="title">{{ $art->title }}</h2></a>
                    <p class='body'>{{ $art->body }}</p>
                </div>
            @endforeach
        </div>
        <a href="/categories/{{ $art->category->id }}">{{ $art->category->name }}</a>
        <div class='pagiate'>{{ $arts->links() }}</div>
        
    </body>
</html>