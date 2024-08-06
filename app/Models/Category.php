<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;


    // 1 kategori punya banyak post (one to many)
    public function posts(): HasMany{
        return $this->hasMany(Post::class);
    }
}