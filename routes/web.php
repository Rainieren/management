<?php

use App\Models\User;
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
    Route::get('/', function () {
        $user = User::find(1);
        return view('home', compact('user'));
    });

    Route::get('/user/create', [\App\Http\Controllers\UserController::class, 'create'])->name('create.user');
    Route::post('/user/store', [\App\Http\Controllers\UserController::class, 'store'])->name('store.user');
});

Route::post('/reset-password', [\App\Http\Controllers\UserController::class, 'resetPassword'])->name('reset.password');


