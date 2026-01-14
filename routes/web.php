<?php

use App\Http\Controllers\OpenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
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

// Route::post('/register', [RegisterController::class, 'register']);

Route::controller(OpenController::class)->group(function(){
    Route::get('/login', 'showLogin')->name('show.login');
    // Route::post('/login', 'login')->name('login');
    // Route::get('/logout', 'logout')->name('logout');
});

Route::controller(UserController::class)->middleware('auth')->prefix('users')->group(function(){
    Route::get('/', 'index')->name('users.index');
    Route::get('/create', 'create')->name('users.create');
    Route::post('/store', 'store')->name('users.store');
    Route::get('/edit/{user}', 'edit')->name('users.edit');
    Route::post('/update/{user}', 'update')->name('users.update');
});

Route::get('/', function () {
    return view('welcome');
});
