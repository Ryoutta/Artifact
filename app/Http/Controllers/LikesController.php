<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;


class LikesController extends Controller
{
    public function like($id)
    {
        Like::create([
            'art_id' => $id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'You Liked the Reply.');
    }

    public function unlike($id)
    {
        $like = Like::where('art_id', $id)->where('user_id', Auth::id())->first();

        if ($like) {
            $like->delete();
            return redirect()->back()->with('success', 'You Unliked the Reply.');
        }

        return redirect()->back()->with('error', 'Like not found.');
    }
}

