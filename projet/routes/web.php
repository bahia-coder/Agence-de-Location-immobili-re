<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Foundation\Bootstrap\RegisterProviders;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admins\AdminsController;
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
Route::get('/', [App\Http\Controllers\Props\PropertiesController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::get('/monavis', [ReviewController::class, 'monAvis'])->middleware('auth')->name('avis.monavis');

Route::group(['prefix' => 'props'], function () {
    Route::get('prop-details/{id}', [App\Http\Controllers\Props\PropertiesController::class, 'single'])->name('single.prop');

    // Inserting requests
    Route::post('prop-details/{id}', [App\Http\Controllers\Props\PropertiesController::class, 'insertRequests'])->name('insert.request');

    // Saving props
    Route::get('save-props/{id}', [App\Http\Controllers\Props\PropertiesController::class, 'saveProps'])->name('show.save.form');
    Route::post('save-props/{id}', [App\Http\Controllers\Props\PropertiesController::class, 'saveProps'])->name('save.prop');

    // Displaying props by rent and buy
    Route::get('type/Buy', [App\Http\Controllers\Props\PropertiesController::class, 'propsBuy'])->name('buy.prop');
    Route::get('type/Rent', [App\Http\Controllers\Props\PropertiesController::class, 'propsRent'])->name('rent.prop');

    // Displaying props by home type
    Route::get('home_type/{home_type}', [App\Http\Controllers\Props\PropertiesController::class, 'displayByHomeType'])->name('display.prop.hometype');
    





    // Displaying props by price
    Route::get('price-asc', [App\Http\Controllers\Props\PropertiesController::class, 'priceAsc'])->name('price.asc.prop');
    Route::get('price-desc', [App\Http\Controllers\Props\PropertiesController::class, 'priceDesc'])->name('price.desc.prop');

    // Searching for props
    Route::any('search', [App\Http\Controllers\Props\PropertiesController::class, 'searchProps'])->name('search.prop');
});


Route::post('/avis', [ReviewController::class, 'store'])->middleware('auth')->name('avis.store');
Route::post('/admin/check-login', [App\Http\Controllers\Admins\AdminsController::class, 'checkLogin'])->name('check.login');
Route::get('/avis/{id}/edit', [ReviewController::class, 'edit'])->name('avis.edit');
Route::post('/avis/{id}/update', [ReviewController::class, 'update'])->name('avis.update');
Route::get('/monavis', [ReviewController::class, 'monAvis'])->name('monavis');
//Route::get('/avis/{id}/edit', [ReviewController::class, 'edit'])->name('avis.edit');
//Route::put('/avis/{id}', [ReviewController::class, 'update'])->name('avis.update');


Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('index', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.dashboard');
    Route::get('allUsers', [App\Http\Controllers\Admins\AdminsController::class, 'allUsers'])->name('users.display');
    Route::get('createUsers', [App\Http\Controllers\Admins\AdminsController::class, 'createUsers'])->name('users.create');
    Route::post('createUser', [App\Http\Controllers\Admins\AdminsController::class, 'storeUsers'])->name('users.store');
    Route::delete('/admin/users/{user}', [App\Http\Controllers\Admins\AdminsController::class, 'destroy'])->name('users.destroy');



     //  hometypes
     Route::get('allHomeTypes', [App\Http\Controllers\Admins\HometypesController::class, 'allHomeTypes'])->name('admins.hometypes');

     // create home type
     Route::get('createHomeTypes', [App\Http\Controllers\Admins\HometypesController::class, 'createHomeTypes'])->name('admins.create.hometypes');
     Route::post('createHomeTypes', [App\Http\Controllers\Admins\HometypesController::class, 'storeHomeTypes'])->name('admins.store.hometypes');
 
     //  edit and update home type
     Route::get('editHomeTypes/{id}', [App\Http\Controllers\Admins\HometypesController::class, 'editHomeTypes'])->name('admins.edit.hometypes');
     Route::post('updateHomeTypes/{id}', [App\Http\Controllers\Admins\HometypesController::class, 'updateHomeTypes'])->name('admins.update.hometypes');
 
     //  delete home type
     Route::get('deleteHomeTypes/{id}', [App\Http\Controllers\Admins\HometypesController::class, 'deleteHomeTypes'])->name('admins.delete.hometypes');
    //  props

    Route::get('allProps', [App\Http\Controllers\Admins\AdminsController::class, 'allProps'])->name('admins.allProps');

    // create props
    Route::get('createProps', [App\Http\Controllers\Admins\AdminsController::class, 'createProps'])->name('admins.createProps');
    Route::post('createProps', [App\Http\Controllers\Admins\AdminsController::class, 'storeProps'])->name('admins.storeProps');


    // create gallery

    Route::get('createGallery', [App\Http\Controllers\Admins\AdminsController::class, 'createGallery'])->name('admins.createGallery');
    Route::post('createGallery', [App\Http\Controllers\Admins\AdminsController::class, 'storeGallery'])->name('admins.storeGallery');

    //  delete props

    Route::get('deleteProps/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteProps'])->name('admins.propsDelete');


});

Route::get('/admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'viewLogin'])->name('view.login')->middleware('auth.check');



 // display all requests

Route::get('allRequests', [App\Http\Controllers\Admins\AdminsController::class, 'allRequests'])->name('admins.allRequests');











//route pour admin request
Route::post('/property/{propId}/request', [AdminsController::class, 'storeRequest'])->name('insert.request');
