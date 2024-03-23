<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TeratailController;
use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;





// Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('/teratail', [TeratailController::class, 'index'])->name('teratail');

Route::controller(PostController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/posts','index') -> name('posts.index');
    Route::get('/posts/{post}', 'show')->where('post','[0-9]+')->name('show');
});


Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::post('/posts', 'store')->name('store');
    Route::get('/posts/create', 'create')->name('create');
    Route::put('/posts/{post}', 'update')->name('update');
    Route::delete('/posts/{post}', 'delete')->name('delete');
    Route::get('/posts/{post}/edit', 'edit')->name('edit');
});

Route::get('/categories/{category}', [CategoryController::class,'index']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/contact', [ContactsController::class,'index'])->name('contact.index');
Route::post('/contact/confirm', [ContactsController::class,'confirm'])->name('contact.confirm');
Route::post('/contact/thanks', [ContactsController::class,'send'])->name('contact.send');

require __DIR__.'/auth.php';
