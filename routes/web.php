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

Route::get('/admin/{any}', function () {
    return view('dashboards.admin');
})->where('any', '.*');

Route::get('/logout', 'UsersController@logout');

Auth::routes();

Route::get('/', function () {
    return view('full_screen');
})->name('login');

Route::get('/vender-registration', function () {
    return view('habib.vendor_registor');
});

Route::get('/{any}', function () {
    return view('full_screen');
})->where('any', '.*');

Route::get('/login', function () {
    return view('full_screen');
});
