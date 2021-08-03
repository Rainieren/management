<?php

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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', function () {
        return redirect()->route('home');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::post('/user/subscribe', [App\Http\Controllers\UserController::class, 'store'])->name('subscribe');

    Route::prefix('projects')->group(function () {
        Route::get('/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('project_create');
    });
});


