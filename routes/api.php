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
    Route::get('/homepage/{id?}', 'SellerController@getSellerHomepage');
    Route::get('/bestcategories/{id?}', 'SellerController@getBestSellerCategories');
    Route::get('/getcategorytitle/{id?}', 'SellerController@getCatTitle');
});

Route::get('/vendor-order/{id}', 'OrdersController@getVendorOrderById');
Route::get('/user-order', 'OrdersController@fetchUserOrders');
Route::get('/user-order-summary/{id}', 'OrdersController@fetchUserOrdersSummary');
Route::get('/user-profile/{id}', 'UsersController@userProfile');
Route::post('/user-profile-update','UsersController@updateUserInfo');
Route::post('/user-profile-password','UsersController@updateUserPass');
Route::post('/user-profile-location','UsersController@updateUserLoc');

Route::prefix('orders')->group(function () {
    Route::get('/seller/{seller_id?}/{per_page?}/{order_by?}/{order?}/{search?}/{status?}/{date?}',
        'OrdersController@fetchAllBySeller');
    Route::get('/vendor/{vendor_id?}/{per_page?}/{order_by?}/{order?}/{search?}/{status?}/{date?}',
        'OrdersController@fetchAllByVendor');
    Route::get('/vendor-change-status/{vendor_id}/{order_id}/{status}',
        'OrdersController@updateOrderStatus');
    Route::get('/{per_page}/{search?}/{category?}/{sub_category?}', 'OrdersController@index');

});
// http://127.0.0.1:8000/api/products?user=0&order_by=id&order=desc&search=0&status=0&category=0&sub_category=0&min_price=300&max_price=0&brand=%27HP%27,%27Dell%27,%27Asus%27&colors=&warranty=0&ram=&processor=

Route::get('/products/{user?}/{orderBy?}/{order?}/{search?}/{status?}/{category?}/{sub_category?}/{brand?}', 'ProductController@fetch');

Route::get('/allproducts', 'ProductController@fetchall');
Route::get('/categories', 'CategoryController@fetch');
Route::get('/categorieslimited', 'CategoryController@fetchWithLimit');
Route::get('/headerfooter/{id}', 'SellerController@fetchHeaderFooter');
Route::get('/filters', 'ProductsMetaController@fetch');

Route::post('/addtocart', 'CartItemsController@addToCart');
Route::post('/updatecart', 'CartItemsController@updateCart');
Route::post('/usercartdata', 'CartItemsController@userCartData');
Route::post('/removecartdata', 'CartItemsController@removeCartData');
Route::post('/placeorder', 'OrdersController@createOrder');
Route::post('/product-history', 'ProductController@producthistory');

Route::prefix('product')->group(function () {
    Route::post('/', 'ProductController@create');

    Route::get('/remove/{product?}', 'ProductController@remove');
    Route::get('/get/{product?}', 'ProductController@get');
    Route::get('/recommended/{product?}', 'ProductController@getRecommended');
    Route::get('/featured', 'ProductController@getFeatured');
    Route::get('/justforyou/{id?}', 'ProductController@getJustForYou');
});

Route::prefix('category')->group(function () {
    Route::post('/delete/{id}', 'CategoryController@delete');
});

Route::get('/website/{seller_id}', 'SellerController@website');
Route::get('/domain-hosting/domain/{domain?}', 'DomainHostingController@checkDomainAvailability');
