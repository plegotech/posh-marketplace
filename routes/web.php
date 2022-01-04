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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/demo', function () {
    return view('auth.loginMarkup');
});

Auth::routes();
