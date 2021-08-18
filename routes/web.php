<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\WebhookController;
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
            Route::get('{name}/account', [UserController::class, 'showAccount'])->name('show.user.account');
            Route::post('{name}/payment_details/store', [UserController::class, 'storePaymentDetails'])->name('store.user.payment_details');
        });

        Route::get('{name}/invoice/{invoice}', [UserController::class, 'downloadInvoice'])->name('download.invoice');
        // Only a subscribed user is allowed to access these routes.
        Route::get('create', [UserController::class, 'create'])->name('create.user');
        Route::post('store', [UserController::class, 'store'])->name('store.user');

    });
    // Only accessable by subscribed customers
    Route::group(['middleware' => 'subscribed.customer'], function() {
        Route::prefix('invoices')->group(function () {
            // Only the owner of the profile is allowed to access these routes.
            Route::get('/', [InvoiceController::class, 'index'])->name('show.invoices');
            Route::get('/create', [InvoiceController::class, 'create'])->name('create.invoice');
            Route::post('/store', [InvoiceController::class, 'store'])->name('store.invoice');
            Route::post('/pay/{invoice}', [InvoiceController::class, 'pay'])->name('pay.invoice');
            Route::get('/{number}', [InvoiceController::class, 'show'])->name('show.invoice');
        });

        Route::prefix('subscription')->group(function () {
            Route::post('/swap', [SubscriptionController::class, 'swap'])->name('subscription.swap');
            Route::post('/cancel', [SubscriptionController::class, 'cancel'])->name('subscription.cancel');
            Route::post('/resume', [SubscriptionController::class, 'resume'])->name('subscription.resume');
        });
        Route::prefix('announcements')->group(function () {
            Route::get('/create', [\App\Http\Controllers\AnnouncementController::class, 'create'])->name('create.announcement');
            Route::post('/store', [\App\Http\Controllers\AnnouncementController::class, 'store'])->name('store.announcement');
        });

        Route::prefix('issues')->group(function () {
            Route::get('/', [\App\Http\Controllers\IssueController::class, 'index'])->name('show.issues');
            Route::get('/create', [\App\Http\Controllers\IssueController::class, 'create'])->name('create.issues');
            Route::post('/store', [\App\Http\Controllers\IssueController::class, 'store'])->name('store.issues');
        });

    });

    // Only non-subscribers are allowed to access these routes.
    Route::group(['middleware' => 'not.subscribed.customer'], function() {
        // Make this a more generic checkout for all kinds of stuff.
        Route::get('/subscription/{slug}/checkout', [SubscriptionController::class, 'index'])->name('subscription.checkout');
        Route::post('/subscription/store', [SubscriptionController::class, 'store'])->name('subscription.store');
    });

});

Route::post('/reset-password', [UserController::class, 'resetPassword'])->name('reset.password');

Route::stripeWebhooks('stripe-webhook');
