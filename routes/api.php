<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('/athenticated', function () {
    return true;
});

Route::prefix('admin')->group(function () {
    Route::get('/orders/{for}', 'OrdersController@adminOrders');
    Route::get('/admin-data', 'AdminController@adminData');
    Route::get('/basic-statistics/{time_period?}/{first_date?}/{last_date?}', 'AdminController@basicStatistics');
});

Route::get('/companies/{type?}/{perpage?}/{order_by?}/{order?}/{status?}/{search?}',
    'CompaniesController@companies');
Route::post('/company', 'CompaniesController@createCompany');
Route::post('/update-company', 'CompaniesController@updateCompany');
Route::get('/export-companies/{type}', 'CompaniesController@exportCompanies');

Route::post('/login', 'UsersController@login');
Route::get('/users/{type?}/{perpage?}/{order_by?}/{order?}/{status?}/{search?}', 'UsersController@users');
Route::post('/user', 'UsersController@createUser');
Route::get('/user/toggle-activation/{userid}', 'UsersController@toggleActivation');
Route::get('/user/change-status/{userid}/{status}', 'UsersController@changeUserStatus');
Route::get('/user-company/{userid}', 'CompaniesController@getCompanyByUserId');

Route::post('/vendor', 'VendorController@vendor');

Route::post('/seller-product', 'SellerController@sellerProduct');
Route::get('/seller/sold/statistics/{seller}/{order_by}/{order}/{month}/{year}/{per_page}', 'SellerController@soldStatistics');
Route::post('/seller/{step}', 'SellerController@seller');

Route::get('/vendor-order/{id}', 'OrdersController@getVendorOrderById');

Route::prefix('orders')->group(function () {
    Route::get('/{per_page}/{search?}/{category?}/{sub_category?}', 'OrdersController@index');
    Route::get('/seller/{seller_id?}/{per_page?}/{order_by?}/{order?}/{search?}/{status?}',
        'OrdersController@fetchAllBySeller');
    Route::get('/vendor/{vendor_id?}/{per_page?}/{order_by?}/{order?}/{search?}/{status?}',
        'OrdersController@fetchAllByVendor');
    Route::get('/vendor-change-status/{vendor_id}/{order_id}/{status}',
        'OrdersController@updateVendorOrderStatus');

});

Route::get('/products/{user?}/{orderBy?}/{order?}/{search?}/{status?}/{category?}/{sub_category?}', 'ProductController@fetch');
Route::get('/product/remove/{product?}', 'ProductController@remove');
Route::post('/product', 'ProductController@create');

Route::get('/website/{seller_id}', 'SellerController@website');
Route::get('/domain-hosting/domain/{domain?}', 'DomainHostingController@checkDomainAvailability');
