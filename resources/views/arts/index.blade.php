<x-app-layout >
    <!--<h1 class="text-4xl">作品一覧</h1>-->
    <!--<button type="buton" onclick="location.href='/arts/create'">新規作品投稿</button>-->
    <div class='arts flex justify-center'>
        <img class="w-1/12 block" src="/image/newart.png">
    </div>
    <div class='grid grid-cols-4 '>
        @foreach($arts as $art)
            <div class='art m-11 '>
                <div class=" " style="height: 200px;">
                    <img src="{{ $art->image_url}}" alt="画像が読み込めません。" class="w-full h-full block object-contain flex justify-center" />
                </div>
                <div class="flex justify-center">
                    制作者：{{ Auth::user()->name }}
                </div>
                <a href="/arts/{{ $art->id }}" class="flex justify-center underline"><h2 class="title text-2xl font-mono">{{ $art->title }}</h2></a>
                <!--<p class='body'>{{ $art->body }}</p>-->
                <!--<form action="/arts/{{ $art->id }}" id="form_{{ $art->id }}" method="post">-->
                <!--    @csrf-->
                <!--    @method('DELETE')-->
                <!--    <button type="button" onclick="deleteArt({{ $art->id }})">作品削除</button>-->
                <!--</form>-->
                <a href="/categories/{{ $art->category->id }}" class="flex justify-center underline">{{ $art->category->name }}</a>
                
            </div>
        @endforeach
    </div>
    <div class='pagiate flex justify-center'>{{ $arts->links() }}</div>
        <script>
    //     function deleteArt(id){
    //         'use strict'
            
    //         if(confirm('削除すると復元できません。\n本当に削除しますか？')){
    //             document.getElementById(`form_${id}`).submit();
    //         }
    //     }
    // </script>
        
</x-app-layout>