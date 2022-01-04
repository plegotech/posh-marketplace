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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/companies/{type?}/{perpage?}/{order_by?}/{order?}', 'CompaniesController@companies');
Route::post('/company', 'CompaniesController@createCompany');
Route::get('/export-companies/{type}', 'CompaniesController@exportCompanies');

Route::get('/users/{type?}/{perpage?}/{order_by?}/{order?}', 'UsersController@users');
Route::post('/user', 'UsersController@createUser');
Route::get('/user/toggle-activation/{userid}', 'UsersController@toggleActivation');

