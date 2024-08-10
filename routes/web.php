<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;


Route::get('/', function () {
    return view('home', ['title' => 'Homepage']);
});

Route::get('/about', function () {
    return view('about', ['nama' => 'Zhang Purnama', 'title' => 'About']);
});

Route::get('/posts', function () {
    $posts = Post::with(['author', 'category'])->latest()->get();
    return view('posts', ['title' => 'Blog', 'posts' => $posts]);
});

Route::get('/posts/{post:slug}', function (Post $post) {

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

Route::get('/authors/{user:username}', function (User $user) {
    $posts = $user -> posts-> load('category', 'author');
    
    return view('posts', ['title' => count($posts) . ' Articles by ' . $user->name, 'posts' => $posts]);
});
Route::get('/categories/{category:slug}', function (Category $category) {
    $posts = $category->posts->load('category', 'author');
    
    return view('posts', ['title' => 'Articles in: ' . $category->name, 'posts' => $posts]);
});

// Route::get('/authors', function(){
//     return view('authors', ['title'=>"Authors"]);
// });

//Buat 2 rute baru
//1. /blog
//2 buah artikel, judul dan isi
//2. /contact
//email / social me