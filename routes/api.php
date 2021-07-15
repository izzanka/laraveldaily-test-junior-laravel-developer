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

Route::prefix('v1')->group(function(){
    Route::get('/employees', [EmployeeApiController::class,'getEmployees'])->name('api.employees');
    Route::get('/companies', [CompanieApiController::class,'getCompanies'])->name('api.companies');
});



