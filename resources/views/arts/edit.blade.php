<x-app-layout>
    <body>
        <h1 class="text-4xl mt-4 font-black">投稿編集</h1>
        <div class="flex justify-center ">
        <form action="/arts/{{ $art->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="image mt-8">
                    <h2>作品写真</h2>
                    <input type="file" name="image">
            </div>
            <div class="title">
                <h2>作品名</h2>
                <input type="text" name=art[title] placeholder="作品名" value={{ $art->title }}>
                <p class='title__error' style="color:red">{{ $errors->first('art.title') }} </p>
            </div>
            <div class"body">
                <h2>作品詳細</h2>
                <textarea name="art[body]" placeholder="この作品は小学校で作った作品で…">{{ $art->body }}</textarea>
                <p class='body__error' style="color:red">{{ $errors->first('art.body') }} </p>
            </div>
            <!--ここにカテゴリーが入っていた-->
        </div>
                
        <div class="footer flex justify-center">
            <input type="submit" value="更新" class="m-4 btn btn-success btn-sm px-2 py-1 bg-red-400 text-white font-semibold rounded hover:bg-red-500"/>
            <a href="/arts/" class="m-4">
                <button type="button" class="px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500">戻る</button>
            </a>
        </div>
        </form>
    </body>
 
 
            

            
            
            
        
    <!--    <div class="footer flex justify-center">-->
    <!--        <input type="button" value="投稿" class="m-4 btn btn-success btn-sm px-2 py-1 bg-red-400 text-white font-semibold rounded hover:bg-red-500"/>-->
    <!--        <a href="/arts/" class="m-4">-->
    <!--            <button type="button" class="px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500">戻る</button>-->
    <!--        </a>-->
    <!--    </div>-->
        
    <!--    </form>-->
    <!--</body>-->
</x-app-layout>