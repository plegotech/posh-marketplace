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

Route::get('/companies/{type?}/{perpage?}/{order_by?}/{order?}/{status?}/{search?}',
    'CompaniesController@companies');
Route::post('/company', 'CompaniesController@createCompany');
Route::get('/export-companies/{type}', 'CompaniesController@exportCompanies');

Route::post('/login', 'UsersController@login');
Route::get('/users/{type?}/{perpage?}/{order_by?}/{order?}/{status?}', 'UsersController@users');
Route::post('/user', 'UsersController@createUser');
Route::get('/user/toggle-activation/{userid}', 'UsersController@toggleActivation');
Route::get('/user/change-status/{userid}/{status}', 'UsersController@changeUserStatus');

