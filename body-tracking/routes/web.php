<?php

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

Route::get('/user_food', 'App\Http\Controllers\UserController@food')->name('user.food');
Route::get('/body_track', 'App\Http\Controllers\UserController@body_track')->name('user.body_track');
Route::get('/workout', 'App\Http\Controllers\UserController@workout')->name('user.workout');
Route::resource('/', 'App\Http\Controllers\HomeController', [
    'names' => [
        'index' => 'home',
    ]
]);
Route::post('/logout', 'App\Http\Controllers\HomeController@logout')->name('logout');
Route::get('/login', 'App\Http\Controllers\UserController@login')->name('user.login');
Route::post('/login_eval', 'App\Http\Controllers\UserController@login_eval')->name('user.login_eval');
Route::get('/register', 'App\Http\Controllers\UserController@register')->name('user.register');
Route::post('/register_eval', 'App\Http\Controllers\UserController@register_eval')->name('user.register_eval');
Route::resource('/user', 'App\Http\Controllers\UserController');
Route::get('/user_consult', 'App\Http\Controllers\MessageContoller@user_consult')->name('user.consult');
Route::get('/admin_consult', 'App\Http\Controllers\MessageContoller@admin_consult')->name('admin.consult');
Route::get('/admin_user_list', 'App\Http\Controllers\MessageContoller@admin_user_list')->name('admin.user_list');
Route::resource('/message', 'App\Http\Controllers\MessageContoller');
Route::resource('/track','App\Http\Controllers\TrackingController' );
Route::get('/admin_login', 'App\Http\Controllers\AdminController@login')->name('admin.login');
Route::post('/admin_login_eval', 'App\Http\Controllers\AdminController@login_eval')->name('admin.login_eval');
Route::resource('/admin', 'App\Http\Controllers\AdminController');
Route::resource('/food', 'App\Http\Controllers\FoodController');