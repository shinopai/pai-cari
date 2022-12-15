<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemsController;

// root
Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// items
Route::resource('items', ItemsController::class);
Route::post('/items/{item}/keep', [ItemsController::class, 'keepItem'])->name('items.keep')->middleware('auth');
Route::delete('/items/{item}/remove-keep', [ItemsController::class, 'removeKeep'])->name('items.removeKeep')->middleware('auth');
Route::get('/search', [ItemsController::class, 'search'])->name('items.search');
Route::post('/items/{item}/add-comment', [ItemsController::class, 'addComment'])->name('items.addComment');
