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
    Route::get('/statistics/{time_period?}/{first_date?}/{last_date?}', 'AdminController@userStatistics');
    Route::get('/basic-statistics/{time_period?}/{first_date?}/{last_date?}', 'AdminController@basicStatistics');
});

Route::get('/companies/{type?}/{perpage?}/{order_by?}/{order?}/{status?}/{search?}',
    'CompaniesController@companies');
Route::post('/company', 'CompaniesController@createCompany');
Route::post('/update-company', 'CompaniesController@updateCompany');
Route::get('/export-companies/{type}', 'CompaniesController@exportCompanies');

Route::post('/login', 'UsersController@login');
Route::get('/users/{type?}/{perpage?}/{order_by?}/{order?}/{status?}/{search?}', 'UsersController@users');
Route::get('/user-company/{userid}', 'CompaniesController@getCompanyByUserId');

Route::prefix('user')->group(function () {
    Route::post('/', 'UsersController@createUser');
    Route::get('/toggle-activation/{userid}', 'UsersController@toggleActivation');
    Route::get('/change-status/{userid}/{status}', 'UsersController@changeUserStatus');
    Route::get('/company/{user}', 'UsersController@userCompany');
});

Route::prefix('vendor')->group(function () {
    Route::post('/', 'VendorController@vendor');
    Route::get('/dashboard/{id}', 'VendorController@dashboard');
});

Route::post('/seller-product', 'SellerController@sellerProduct');

Route::prefix('seller')->group(function () {
    Route::get('/sold/statistics/{seller}/{order_by}/{order}/{month}/{year}/{per_page}',
        'SellerController@soldStatistics');
    Route::get('/dashboard/{id}', 'SellerController@dashboard');

    Route::post('/{step}', 'SellerController@seller');
});

Route::get('/vendor-order/{id}', 'OrdersController@getVendorOrderById');

Route::prefix('orders')->group(function () {
    Route::get('/seller/{seller_id?}/{per_page?}/{order_by?}/{order?}/{search?}/{status?}/{date?}',
        'OrdersController@fetchAllBySeller');
    Route::get('/vendor/{vendor_id?}/{per_page?}/{order_by?}/{order?}/{search?}/{status?}/{date?}',
        'OrdersController@fetchAllByVendor');
    Route::get('/vendor-change-status/{vendor_id}/{order_id}/{status}',
        'OrdersController@updateOrderStatus');
    Route::get('/{per_page}/{search?}/{category?}/{sub_category?}', 'OrdersController@index');

});

Route::get('/products/{user?}/{orderBy?}/{order?}/{search?}/{status?}/{category?}/{sub_category?}/{min_price?}/{max_price?}', 'ProductController@fetch');

Route::prefix('product')->group(function () {
    Route::post('/', 'ProductController@create');

    Route::get('/remove/{product?}', 'ProductController@remove');
    Route::get('/get/{product?}', 'ProductController@get');
});
Route::get('/website/{seller_id}', 'SellerController@website');
Route::get('/domain-hosting/domain/{domain?}', 'DomainHostingController@checkDomainAvailability');
