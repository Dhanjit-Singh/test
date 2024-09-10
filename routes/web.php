<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FrontEnd\UserHomeController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [GuestController::class, 'index'])->name('index');

Route::group(['prefix' => 'admin'], function(){
    Route::name('admin.')->group(function(){
        Route::group(['middleware' => 'guest:admin'], function(){
            Route::get('/register', [AdminController::class, 'register'])->name('register');
            Route::post('/register', [AdminController::class, 'registerPost'])->name('register-post');
            Route::get('/login', [AdminController::class, 'login'])->name('login');
            Route::post('/login', [AdminController::class, 'loginPost'])->name('login-post');
        });
        Route::group(['middleware' => 'admin'], function(){
            Route::get('/home', [AdminController::class, 'home'])->name('home');
            Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

            Route::resource('users', UserController::class);
        });
    });
});


Route::group(['prefix' => 'user'], function(){
    Route::name('user.')->group(function(){
        Route::group(['middleware' => 'guest:user'], function(){
            Route::get('/register', [UserHomeController::class, 'register'])->name('register');
            Route::post('/register', [UserHomeController::class, 'registerPost'])->name('register-post');
            Route::get('/login', [UserHomeController::class, 'login'])->name('login');
            Route::post('/login', [UserHomeController::class, 'loginPost'])->name('login-post');
        });
        Route::group(['middleware' => 'user'], function(){
            Route::get('/home', [UserHomeController::class, 'home'])->name('home');
            Route::get('/logout', [UserHomeController::class, 'logout'])->name('logout');
        });
    });
});


