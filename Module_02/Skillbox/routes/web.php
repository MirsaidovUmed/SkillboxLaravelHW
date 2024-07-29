<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('userform', [App\Http\Controllers\FormController::class,'index'])->name('userform');
Route::post('store_form', [App\Http\Controllers\FormController::class,'store'])->name('storeForm');

Route::get('/test_database', [App\Http\Controllers\EmployeeController::class,'store'])->name('testDb');
