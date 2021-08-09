<?php

use App\Http\Controllers\OrderController;
use App\Models\Plan;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Auth::routes(['verify' => true]);
Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', [HomeController::class, 'index']);

    // All routes that are related to the user and start with "/user"
    Route::prefix('user')->group(function () {
        // Only the owner of the profile is allowed to access these routes.
        Route::group(['middleware' => 'only.owner'], function() {
            Route::get('{name}/billing', [UserController::class, 'showBilling'])->name('show.user.billing');
            Route::post('{name}/payment_details/store', [UserController::class, 'storePaymentDetails'])->name('store.user.payment_details');
        });
        Route::get('{name}/invoice/{invoice}', [UserController::class, 'downloadInvoice'])->name('download.invoice');

        // Only a subscribed user is allowed to access these routes.
        Route::group(['middleware' => 'subscribed.customer'], function() {
            Route::get('create', [UserController::class, 'create'])->name('create.user');
            Route::post('store', [UserController::class, 'store'])->name('store.user');
        });
    });

    Route::prefix('invoices')->group(function () {
        // Only the owner of the profile is allowed to access these routes.
        Route::get('/', [OrderController::class, 'index'])->name('show.invoices');
        Route::get('/create', [OrderController::class, 'create'])->name('create.invoice');
        Route::get('/store', [OrderController::class, 'create'])->name('store.invoice');
    });

    // Only non-subscribers are allowed to access these routes.
    Route::group(['middleware' => 'not.subscribed.customer'], function() {
        // Make this a more generic checkout for all kinds of stuff.
        Route::get('/subscription/{slug}/checkout', [SubscriptionController::class, 'index'])->name('subscription.checkout');
        Route::post('/subscription/store', [SubscriptionController::class, 'store'])->name('subscription.store');
    });
    Route::post('/subscription/swap', [SubscriptionController::class, 'swap'])->name('subscription.swap');
    Route::post('/subscription/cancel', [SubscriptionController::class, 'cancel'])->name('subscription.cancel');
    Route::post('/subscription/resume', [SubscriptionController::class, 'resume'])->name('subscription.resume');
});

Route::post('/reset-password', [UserController::class, 'resetPassword'])->name('reset.password');


