<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    // protected $table = 'blog_posts';
    use HasFactory;
    protected $fillable = ['title', 'author_id', 'slug', 'body'];
    protected $with = ['category', 'author'];

    // 1 post punya 1 user (one to one)
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // 1 post punya 1 kategori (one to one)
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        // if (isset($filters['search']) ? $filters['search'] : false) {
        // if ($filters['search'] ?? false) {
        $query-> when($filters['search'] ?? false, function($query, $search){
            
            $query->where('title', 'like', '%' . request('search') . '%');
        }); 
    }
}