<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryTypeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\AuthenticationController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[AuthenticationController::class,'home'])->name('home');

Route::get('register', [AuthenticationController::class,'registrationForm'])->name('register');
Route::post('register', [AuthenticationController::class,'registrationProcess']);
Route::get('login', [AuthenticationController::class,'loginForm'])->name('login');
Route::post('login', [AuthenticationController::class,'loginProcess']);
Route::post('logout', [AuthenticationController::class,'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//=========================Admin Route==========================================
//Route::group(['as' => 'admin.' , 'prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth', 'admin']], function (){
//    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
////    Route::resource('/category',CategoryController::class);
//    Route::get('category',[CategoryController::class,'index'])->name('category.list');
//});
Route::group(['as' => 'admin.' , 'prefix'=>'admin', 'middleware'=>['auth', 'admin']], function (){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/category-type',CategoryTypeController::class);
    Route::resource('/category',CategoryController::class);
    Route::resource('/sub-category',SubCategoryController::class);
});
//=========================Customer Route=======================================

Route::group(['as' => 'customer.' , 'prefix'=>'customer', 'namespace'=>'Customer', 'middleware'=>['auth', 'customer']], function (){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
