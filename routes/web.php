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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false
]);

Route::resource('companies',CompanieController::class);
Route::resource('employees',EmployeeController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
