<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    // protected $table = 'blog_posts';
    use HasFactory;
    use Sluggable;
    protected $fillable = ['title', 'author_id', 'slug', 'body', 'category_id'];
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
        // $query-> when($filters['search'] ?? false, function($query, $search){

        //     $query->where('title', 'like', '%' . request('search') . '%');
        // }); 

        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) =>
            $query->where('title', 'like', '%' . $search . '%')
        );

        $query->when(
            $filters['category'] ?? false,
            fn($query, $category) =>
            $query->whereHas('category', fn($query) => $query->where('slug', $category))
        );

        $query->when(
            $filters['author'] ?? false,
            fn($query, $author) =>
            $query->whereHas('author', fn($query) => $query->where('username', $author))
        );
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function sluggable():array{
        return[
            'slug' => [
                'slug' => 'title'
                ]
        ];
    }
}