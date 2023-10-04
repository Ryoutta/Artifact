<x-app-layout>

    @foreach ($art->comments as $comment)
    <div class="mb-2">
        <span>
            <strong>
                <a class="no-text-decoration black-color" href="{{ route('users.show', ['name' => $comment->user->name]) }}">{{ $comment->user->name }}</a>
            </strong>
        </span>
        <span>{{ $comment->comment }}</span>
        @if ($comment->user->id == Auth::id())
        <form action="/comments/{{ $comment->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">コメント削除</button>
        </form>
        @endif
    </div>
    @endforeach

</x-app-layout>
