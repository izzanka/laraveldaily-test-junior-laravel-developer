<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanieController;
use App\Http\Controllers\EmployeeController;


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


Auth::routes([
    'register' => false
]);

Route::middleware('auth')->group(function(){
    
    Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => App\Http\Controllers\LanguageController::class,'switch']);

    Route::get('/', function () {
        return view('home');
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('employees',EmployeeController::class)->except(['destroy']);
    Route::get('/employees/{employee}/destroy',[EmployeeController::class,'destroy'])->name('employees.destroy');
    
    Route::resource('companies',CompanieController::class)->except(['destroy']);
    Route::get('/companies/{company}/destroy',[CompanieController::class,'destroy'])->name('companies.destroy');
    
});


