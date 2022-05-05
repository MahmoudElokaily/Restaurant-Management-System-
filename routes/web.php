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


Route::get('/' , 'App\Http\Controllers\HomeController@index');

Route::get('/redirects' , 'App\Http\Controllers\HomeController@redirects');

Route::get('/users', 'App\Http\Controllers\AdminController@user')->name('users.all');

Route::get('/deleteUser/{id}', 'App\Http\Controllers\AdminController@deleteUser');

Route::get('/foodmenu', 'App\Http\Controllers\AdminController@foodmenu');

Route::post('/uploadfood', 'App\Http\Controllers\AdminController@uploadFood')->name('admin.uploadfood');

Route::get('/deletefood/{id}' , 'App\Http\Controllers\AdminController@deletFood')->name('admin.deleteFood');
Route::get('/updatefood/{id}' , 'App\Http\Controllers\AdminController@updateFood')->name('admin.updateFood');
Route::post('/update/{id}' , 'App\Http\Controllers\AdminController@update')->name('admin.update');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


