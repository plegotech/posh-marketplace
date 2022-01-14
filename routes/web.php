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

Route::get('/seller-dashboard', function () {
    return view('habib.SellerDashboard');
});
Route::get('/seller-manage-products', function () {
    return view('habib.SellerManageProducts');
});
Route::get('/vendor-dashboard', function () {
    return view('habib.vendorDashboard');
});
Route::get('/vendor-manage-products', function () {
    return view('habib.vendorManageProducts');
});
Route::get('/vendor-upload-products', function () {
    return view('habib.vendorUploadProducts');
});
Route::get('/{any}', function () {
    return view('full_screen');
})->where('any', '.*');
