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

Route::post('/product', 'ProductController@create');
Route::post('/headerfooter', 'SellerController@createHeaderFooter');
Route::post('/catimages', 'SellerController@createCategoryImages');
Route::get('/getheaderfooter/{id}', 'SellerController@fetchHeaderFooter');
Route::post('/createcategory', 'CategoryController@create');
Route::post('/product-csv', 'ProductController@uploadCsv');
Route::post('/seller/business-licenses', 'SellerController@businessLicenses');
Route::get('/categories', 'CategoryController@fetch');
Route::get('/categoriesall', 'CategoryController@fetchAll');
Route::get('/brands', 'CategoryController@fetchBrands');
Route::post('/create-category', 'CategoryController@create');
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
Route::get('/vendor-Orders-in-progress', function () {
    return view('habib.vendororderinprogress');
});
Route::get('/vendor-all-orders', function () {
    return view('habib.vendorallorders');
});
Route::get('/billing-vendor-side', function () {
    return view('habib.billingvendorside');
});
Route::get('/vendor-product-history', function () {
    return view('habib.vendorproducthistory');
});
Route::get('/vendor-shipping', function () {
    return view('habib.vendorshipping');
});
Route::get('/user-dashboard', function () {
    return view('habib.userdashboard');
});
Route::get('/user-pending-orders', function () {
    return view('habib.userpendingorders');
});
Route::get('/{any}', function () {
    return view('full_screen');
})->where('any', '.*');
