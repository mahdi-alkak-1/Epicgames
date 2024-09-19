<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

Route::get('/', [PagesController::class, 'index']);
Route::resource('store', PostsController::class);

Route::middleware(['admin'])->group(function () {
    Route::get('/store/create', [PostsController::class, 'create'])->name('store.create');
    Route::post('/store', [PostsController::class, 'store'])->name('store.store');
    Route::get('/store/{id}/edit', [PostsController::class, 'edit'])->name('store.edit');
    Route::put('/store/{id}', [PostsController::class, 'update'])->name('store.update');
    Route::delete('/store/{id}', [PostsController::class, 'destroy'])->name('store.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/cart/add/{postId}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.index');
    Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
});
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/search', [PostsController::class, 'search'])->name('store.search');




Auth::routes();

