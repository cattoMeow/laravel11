<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $catto = User::create([
            'name' => 'cattoMeow',
            'username' => 'cattomeow',
            'email' => 'abcde@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        // Category::create([
        //     'name' => 'Web Design',
        //     'slug' => 'web-design',

        // ]);

        // Post::create([
        //     'title' => 'Judul Artikel 1',
        //     'author_id' => 1,
        //     'category_id' => 1,
        //     'slug' => 'artikel-1',
        //     'body' => "Lorem ipsum dolor sit amet, consectetur adipisicing \"elit. Doloremque, cupiditate?"
        // ]);

        Post::factory(100)->recycle([
            Category::factory(3)->create(),
            $catto,
            User::factory(5)->create(),
        ])->create();
    }
}
