<?php

namespace App\Models;

use Illuminate\support\Arr;

class Post
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'slug' => 'judul-artikel-1',
                'title' => 'Judul Artikel 1',
                'author' => 'Zhang Purnama',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut quis, molestias neque ipsum autem commodi sapiente est officia cum. Temporibus!'
            ],
            [
                'id' => 2,
                'slug' => 'judul-artikel-1',
                'title' => 'Judul Artikel 2',
                'author' => 'Zhang Purnama',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem itaque velit quis
                enim est?
                Inventore
                obcaecati commodi debitis iste saepe.'
            ]
        ];
    }

    public static function find($slug): array
    {
        // return Arr::first(static::all(), function($post) use ($slug) {
        //     return $post['slug'] == $slug;
        // });
        $post = Arr::first(static::all(), fn ($post) => $post['slug'] == $slug);
        if (!$post) {
            abort(404);
        }
        return $post;
    }
}
