<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanieApiController;
use App\Http\Controllers\Api\EmployeeApiController;

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


Route::get('/getEmployees', [EmployeeApiController::class,'getEmployees'])->name('api.employees');
Route::get('/getCompanies', [CompanieApiController::class,'getCompanies'])->name('api.companies');

Route::apiResource('employees', EmployeeApiController::class)->only(['index','show']);
Route::apiResource('companies', CompanieApiController::class)->only(['index','show']);






