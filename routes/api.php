<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
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


Route::apiResource('companies',CompanyController::class);
Route::get('deletedCompanies', [CompanyController::class, 'deletedData']);
Route::post('companies/{id}/force_delete', [CompanyController::class, 'forceDelete']);
Route::post('companies/{id}/restore', [CompanyController::class, 'restore']);


Route::apiResource('customers',CustomerController::class);
Route::get('deletedCustomers', [CustomerController::class, 'deletedData']);
Route::post('customers/{id}/force_delete', [CustomerController::class, 'forceDelete']);
Route::post('customers/{id}/restore', [CustomerController::class, 'restore']);
Route::get('costumers/getByCompanyId/{id}',[CustomerController::class, 'getByCompanyId']);




