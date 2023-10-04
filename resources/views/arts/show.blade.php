<x-app-layout>
    <h1 class="text-4xl mt-4 font-black">作品詳細</h1>
    
    <div class="content " style="height: 200px;">
        <img src="{{ $art->image_url}}" alt="画像が読み込めません。" class="w-full h-full block object-contain flex justify-center" />
    </div>
    
    <div class="flex justify-center">
        制作者：{{ Auth::user()->name }}
    </div>
    
    <div class="flex justify-center mt-4">
        <h2 class='title'>
            <a href="/arts/{{ $art->id }}">{{ $art->title }}</a>
        </h2>
    </div>
    
    <div class="flex justify-center mt-4">
        <p class='body'>{{ $art->body }}</p>
    </div>
    
    <div class="flex justify-center mt-4">
        <a href="/categories/{{ $art->category->id }}">{{ $art->category->name }}</a>
    </div>
    
    <div class="flex justify-center mt-4">
        <form action="/arts/{{ $art->id }}" id="form_{{ $art->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteArt({{ $art->id }})" class="px-2 py-1 bg-yellow-400 text-white font-semibold rounded hover:bg-yellow-500 m-4">作品削除</button>
        </form>
        <div class="edit">
            <a href="/arts/{{ $art->id }}/edit">
                <button type="button" class="px-2 py-1 bg-yellow-400 text-white font-semibold rounded hover:bg-yellow-500 m-4">作品修正</button>
            </a>
        </div>
    </div>
    
    <div class="flex justify-center mt-8">
        <a class="light-color post-time no-text-decoration " href="/articles/{{ $art->id }}">{{ $art->created_at }}</a>
    </div>
    
    <div class="border-b "></div>
    <p class="flex justify-center mt-8">コメント一覧</p>
    
    <div class="card-body line-height mt-8">
        @foreach($art->comments as $comment) 
            <div class="flex justify-center">{{ $comment->comment }}</div>
        @endforeach
        
        <div class=" actions flex justify-center" id="comment-form-art-{{ $art->id }}">
            <div>
                <form class="w-100 " action="/arts/{{ $art->id }}/comments" method="post">
                    @csrf
                    <input type="hidden" name="art_id" value="{{ $art->id }}">
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <input class="form-control comment-input " placeholder="コメント ..." autocomplete="off" type="text" name="comment" />
                    <button type="submit" class="btn btn-primary px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500">コメント投稿</button>
                </form>
            </div>
        </div>
    </div>

    <div class=" flex justify-center mt-4">
        <div>
            @if($art->is_liked_by_auth_user())
                <form action="{{ route('art.unlike', ['id' => $art->id]) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm px-2 py-1 bg-red-400 text-white font-semibold rounded hover:bg-red-500 m-4">いいね<span class="badge">{{ $art->likes->count() }}</span></button>
                </form>
            @else
                <form action="{{ route('art.like', ['id' => $art->id]) }}" method="post">
                    @csrf
                    <button type="submit" class="px-2 py-1 text-red-500 border border-red-500 font-semibold rounded hover:bg-red-100 m-4">いいね<span class="badge">{{ $art->likes->count() }}</span></button>
                </form>
            @endif
        </div>
        
        <div class="footer">
            <a href="/arts/">
                <button type="button" class="px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500 m-4">戻る</button>
            </a>
        </div>
    </div>
    <script>
        function deleteArt(id){
            'use strict'
            
            if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
    
</x-app-layout>
