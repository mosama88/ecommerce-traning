<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLogin;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\BulkDeleteController;


Route::middleware(['dashboard', 'auth:admin', 'verified'])->group(function () {

    Route::view('/', 'dashboard.index')->name('index');

    Route::resource('categories', CategoryController::class);
    Route::get('change-language/{lang}', [LanguageController::class, 'changeLanguage'])->name('change.language');
    Route::post('/delete-items', [BulkDeleteController::class, 'bulkDelete'])->name('bulkDelete');
});

Route::middleware('guest:admin')->group(function () {
    Route::get('login', [AdminLogin::class, 'create'])->name('login');
    Route::post('login', [AdminLogin::class, 'store']);
});