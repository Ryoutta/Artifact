<x-app-layout>
    <body>
        
        <h1 class="text-4xl mt-4 font-black">作品投稿</h1>
        <div class="flex justify-center ">
            <form action="/arts" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="image mt-8">
                    <h2>作品写真</h2>
                    <input type="file" name="image">
                </div>
                <div class="title mt-8">
                    <h2>作品名</h2>
                    <input type="text" name=art[title] placeholder="作品名" value={{ old('art.title' )}}>
                    <p class='title__error' style="color:red">{{ $errors->first('art.title') }} </p>
                </div>
                <div class="body mt-8">
                    <h2>作品詳細</h2>
                    <textarea name="art[body]" placeholder="この作品は小学校で作った作品で…">{{old('art.body')}}</textarea>
                    <p class='body__error' style="color:red">{{ $errors->first('art.body') }} </p>
                </div>
                <div class="category mt-8">
                    <h2>カテゴリー</h2>
                    <select name="art[category_id]">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
        </div>
        
        <div class="footer flex justify-center">
            <input type="submit" value="投稿" class="m-4 btn btn-success btn-sm px-2 py-1 bg-red-400 text-white font-semibold rounded hover:bg-red-500"/>
            <a href="/arts/" class="m-4">
                <button type="button" class="px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500">戻る</button>
            </a>
        </div>
        
        </form>
    </body>
    
</x-app-layout>