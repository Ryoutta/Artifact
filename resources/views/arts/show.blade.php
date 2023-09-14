<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ArtLink</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class='title'>
            {{ $art->title }}
        </h1>
        <div class='content'>
            <div class='content_art'>
                <h3>本文</h3>
                <p class='body'>{{ $art->body }}</p>
            </div>
        </div>
        <h2 class='title'>
            <a href="/arts/{{ $art->id }}">{{ $art->title }}</a>
        </h2>
        <a href="/categories/{{ $art->category->id }}">{{ $art->category->name }}</a>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        
    </body>
</html>