<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ArtLink</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>アート投稿</h1>
        <form action="/arts" method="POST">
            @csrf
            <div class="title">
                <h2>作品名</h2>
                <input type="text" name=art[title] placeholder="作品名" value={{ old('art.title' )}}>
                <p class='title__error' style="color:red">{{ $errors->first('art.title') }} </p>
            </div>
            <div class"body">
                <h2>作品詳細</h2>
                <textarea name="art[body]" placeholder="この作品は小学校で作った作品で…">{{old('art.body')}}</textarea>
                <p class='body__error' style="color:red">{{ $errors->first('art.body') }} </p>
            </div>
            <div class="category">
                <h2>Category</h2>Category<select name="art[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="store">
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>