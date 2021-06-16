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



//AUTHENTICATION ROUTES
Auth::routes();


//ADMIN ROUTES
Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function() {
        //home admin route
        Route::get('/', 'HomeController@index')->name('home');

        //resource post route
        Route::resource('/posts', 'PostController');
    });


//Front Office - Vue
Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*');  //take the guest to Vue if it's none of the above routes, 'any' can be *, anything
