<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Post;



Route::get('/', function () {
    return view('home', ['title' => 'Homepage']);
});

Route::get('/about', function () {
    return view('about', ['nama' => 'Zhang Purnama', 'title' => 'About']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => Post::all()]);

    
});

Route::get('/posts/{slug}', function($slug){
  
    $post = Post::find($slug);

    return view('post', ['title' => 'Single Post', 'post' => $post]);
    
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

//Buat 2 rute baru
//1. /blog
//2 buah artikel, judul dan isi
//2. /contact
//email / social me