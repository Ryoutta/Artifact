<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request, $art_id)
    {
        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->art_id = $art_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        //return redirect("/arts/{{ $art->id }}");
        return redirect("/arts/". $art_id);
    }

    public function destroy($comment_id)
    {
        $comment = Comment::find($comment_id);
        
        if ($comment) {
        $art_id = $comment->art_id;
        $comment->delete();
        
    }
        //return redirect('/arts/');
        return redirect("/arts/$art_id");
    }
}
