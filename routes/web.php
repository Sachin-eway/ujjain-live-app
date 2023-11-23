<?php

use App\Http\Controllers\AppSettingController;
use App\Http\Controllers\CategorysController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubCategoryController;
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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::middleware(['auth', 'cache-control'])->group(function () {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard',function(){
    return view('dashboard');
});

//categorys routes
Route::controller(CategorysController::class)->group(function () {
    Route::get('/categorys', 'index')->name('/categorys');
    Route::post('create_category', 'store')->name('create_category');
    Route::post('update_category', 'update')->name('update_category');
    Route::get('delete_category/{id}', 'delete')->name('delete_category');
    Route::get('cat_status/{id}', 'status');
    Route::get('cat_edit/{id}', 'edit');
   
});

//sub categorys
Route::controller(SubCategoryController::class)->group(function () {
    Route::get('/sub_categorys', 'index')->name('/sub_categorys');
    Route::post('sub_create_category', 'store')->name('sub_create_category');
    Route::post('sub_update_category', 'update')->name('sub_update_category');
    Route::get('sub_delete_category/{id}', 'delete')->name('sub_delete_category');
    Route::get('sub_cat_status/{id}', 'status');
    Route::get('sub_cat_edit/{id}', 'edit');
   
});

//mobile app setting
Route::controller(AppSettingController::class)->group(function () {
    Route::get('/app_setting', 'index')->name('/app_setting');
    Route::post('update_setting', 'update')->name('update_setting');
    Route::post('update_contact', 'contactUpdate')->name('update_contact');
   
});

//profile
Route::controller(HomeController::class)->group(function () {
    Route::get('/profile', 'profile')->name('/profile');
    Route::post('/change_password', 'changePass')->name('change_password');
 
   
});
});