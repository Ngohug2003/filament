<?php

use App\Livewire\CategoryPage;
use App\Livewire\HomePage;
use App\Livewire\PostDetail;
use Illuminate\Support\Facades\Route;

Route::get('/' , HomePage::class);
Route::get('/category/{slug}', CategoryPage::class)->name('category.posts');
Route::get('/post/{slug}', PostDetail::class)->name('post.show');


