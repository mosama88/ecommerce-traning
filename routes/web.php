<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLogin;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebSite\CartController;
use App\Http\Controllers\WebSite\WebSiteController;
use App\Http\Controllers\Dashboard\CategoryController;

Route::name('front.')->group(function () {
    Route::view('/', 'website.index')->name('index');
    // Route::view('/books', 'website.books')->name('books');
    Route::view('/about', 'website.about')->name('about');
    Route::view('/wish-list', 'website.wishlist')->name('wishlist');
    Route::view('/single-book', 'website.singleBook')->name('singleBook');
    Route::view('/user/profile', 'website.profile')->name('profile');



    Route::get('books', [WebSiteController::class, 'getBooks'])->name('books');
    Route::prefix('cart')->name('cart.')->group(function () {

        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/items/{book_id}', [CartController::class, 'addItem'])->name('add');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('logout', [AdminLogin::class, 'destroy'])
    ->name('logout');




        
// require __DIR__ . '/auth.php';