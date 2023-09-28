<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    public function arts()
    {
        return $this->hasMany(Art::class);
    }
    
    public function getByCategory(int $limit_count=4)
    {
        return $this->arts()->with('category')->orderBy('updated_at','DESC')->paginate($limit_count);
    }
}
