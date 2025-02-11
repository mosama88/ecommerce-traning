<?php

use App\Models\AddToCart;
use App\Enum\InteractionsTypesEnum;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLogin;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebSite\CartController;
use App\Http\Controllers\WebSite\WebSiteController;
use App\Http\Controllers\WebSite\WishListController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::name('front.')->group(function () {
    Route::get('/', [WebSiteController::class, 'index'])->name('index');

    Route::view('/about', 'website.about')->name('about');
    // Route::view('/wish-list', 'website.wishlist')->name('wishlist');
    Route::view('/single-book', 'website.singleBook')->name('singleBook');
    Route::view('/user/profile', 'website.profile')->name('profile');


    // Books
    Route::get('books', [WebSiteController::class, 'getBooks'])->name('books');

    // Cart
    Route::prefix('cart')->name('cart.')->controller(CartController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/items/{book_id}', 'addItem')->name('add');
        Route::delete('/removeItem/{book_id}', 'removeItem')->name('removeItem');
    });



    // wish-list

    Route::prefix('wish-list')->name('wishList.')->controller(WishListController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });
});

Route::middleware('guest')->group(
    function () {
        Route::get('register', [RegisteredUserController::class, 'create'])
            ->name('register');

        Route::post('register', [RegisteredUserController::class, 'store']);

        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('login');

        Route::post('login', [AuthenticatedSessionController::class, 'store']);

        Route::prefix('forget-password')->controller(ForgetPasswordController::class)->name('forgetPassword.')->group(function () {
            Route::get('enter/email', 'showEnterEmail')->name('showEnterEmail');
            Route::post('send/otp', 'sendOtp')->name('sendOtp');
            Route::get('{email}/enter/code', 'showEnterOtp')->name('showEnterOtp');
            Route::post('check/otp', 'checkOtp')->name('checkOtp');
            Route::get('/{email}/{code}', 'showResetPassword')->name('showResetPassword');
            Route::post('', 'resetPassword')->name('resetPassword');
        });
    }
);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::post('logout', [AdminLogin::class, 'destroy'])
    ->name('logout');

Route::middleware('auth')->group(function () {

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});



// require __DIR__ . '/auth.php';
Route::get('/enum', function () {
    // dd((InteractionsTypesEnum::Favorite)); 

    AddToCart::create(['book_id' => 1, 'user_id' => 2, 'quantity' => 5]);
});
