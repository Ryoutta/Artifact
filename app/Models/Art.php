<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Art extends Model
{
    use HasFactory;
    protected $table = 'arts';
    
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'flame_id',
        'category_id',
        'image_url',
        ];
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('category')->orderBy('updated_at','DESC')->paginate($limit_count);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function is_liked_by_auth_user()
    {
        // 現在の認証されたユーザーを取得
        $authUser = Auth::user();
    
        // ユーザーがこのArtをいいねしているかどうかを判定
        return $this->likes()->where('user_id', $authUser->id)->exists();
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    
    
}