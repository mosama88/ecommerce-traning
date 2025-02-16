<?php

use App\Models\Author;
use App\Models\FlashSale;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLogin;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Dashboard\BookController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\AuthorController;
use App\Http\Controllers\Dashboard\ReportController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DiscountController;
use App\Http\Controllers\Dashboard\FlashSaleController;
use App\Http\Controllers\Dashboard\PublisherController;
use App\Http\Controllers\Dashboard\BulkDeleteController;
use App\Http\Controllers\Dashboard\ExportExcelController;
use App\Http\Controllers\Dashboard\ImportExcelController;
use App\Http\Controllers\Dashboard\ShippingAreaController;

Route::middleware(['dashboard', 'auth:admin', 'verified'])->group(function () {

    Route::view('/', 'dashboard.index')->name('index');
    //Category
    Route::resource('categories', CategoryController::class);
    Route::post('add/discount/{category}', [CategoryController::class, 'addDiscount'])->name('add.discount');

    // Discount
    Route::resource('discounts', DiscountController::class);

    // Author
    Route::resource('authors', AuthorController::class);

    // Publisher
    Route::resource('publishers', PublisherController::class);

    // Flash Sale
    Route::resource('flash_sales', FlashSaleController::class);

    // Orders
    Route::resource('orders', OrderController::class);

    //shippingArea
    Route::resource('shippingAreas', ShippingAreaController::class);

    //Books
    Route::resource('books', BookController::class);


    Route::prefix('reports')->name('report.')->group(function () {
        Route::prefix('sales')->name('sales.')->group(function () {
            Route::get('/books', [ReportController::class, 'books'])->name('books');
            Route::get('/revenue', [ReportController::class, 'revenue'])->name('revenue');
            Route::get('/trends', [ReportController::class, 'trends'])->name('trends');
        });
    });

    //Language
    Route::get('change-language/{lang}', [LanguageController::class, 'changeLanguage'])->name('change.language');

    //BulkDelete
    Route::post('/delete-items', [BulkDeleteController::class, 'bulkDelete'])->name('items.bulk-delete');

    //Excel
    Route::post('/import/excel', ImportExcelController::class)->name('import.excel');
    Route::get('/export/excel', ExportExcelController::class)->name('export.excel');
});

Route::middleware('guest:admin')->group(function () {
    Route::get('login', [AdminLogin::class, 'create'])->name('login');
    Route::post('login', [AdminLogin::class, 'store']);
});
