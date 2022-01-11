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
Route::get('/page-loading', function () {
    return view('habib.page_loader');
});
Route::get('/dashboard-vendor', function () {
    return view('habib.SellerDashboard');
});
Route::get('/seller-registration', function () {
    return view('habib.sellerregistration');
});
Route::get('/seller-registration-2', function () {
    return view('habib.sellerregistration2');
});
Route::get('/{any}', function () {
    return view('full_screen');
})->where('any', '.*');

Route::get('/login', function () {
    return view('full_screen');
});
