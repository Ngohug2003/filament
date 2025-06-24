<?php

use App\Livewire\CateogryPage;
use App\Livewire\HomePage;
use Illuminate\Support\Facades\Route;

Route::get('/' , HomePage::class);
Route::get('/category' , CateogryPage::class)->name('category');

