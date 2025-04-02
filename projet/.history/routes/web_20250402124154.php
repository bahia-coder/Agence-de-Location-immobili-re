<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Foundation\Bootstrap\RegisterProviders;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [Controller::class, 'index'])->name('home');
Auth::routes();

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');



Route::post('/admin/check-login', [App\Http\Controllers\Admins\AdminsController::class, 'checkLogin'])->name('check.login');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('index', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.dashboard');
    Route::get('allUsers', [App\Http\Controllers\Admins\AdminsController::class, 'allUsers'])->name('users.display');
    Route::get('createUsers', [App\Http\Controllers\Admins\AdminsController::class, 'createUsers'])->name('users.create');
    Route::post('createUser', [App\Http\Controllers\Admins\AdminsController::class, 'storeUsers'])->name('users.store');
    Route::delete('/admin/users/{user}', [AdminsController::class, 'destroy'])->name('users.destroy');

});

Route::get('/admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'viewLogin'])->name('view.login')->middleware('auth.check');
