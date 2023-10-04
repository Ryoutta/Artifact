<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Like extends Model
{
    use HasFactory;

    protected $fillable = ['art_id', 'user_id'];

    public function reply()
    {
        return $this->belongsTo(Reply::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function art()
    {
        return $this->belongsTo(Art::class);
    }
    
    // Like.php モデル
    public function is_liked_by_auth_user()
    {
        $id = Auth::id();
    
        // $this は Like モデルのインスタンスを指します
        $likers = $this->art->likes->pluck('user_id')->toArray();
    
        return in_array($id, $likers);
    }
    
    
}

