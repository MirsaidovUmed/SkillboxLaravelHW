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
    return view('home', [
        'name' => 'Some name',
        'age' => 17,
        'position' => 'Developer',
        'address' => 'some address'
    ]);
});

// Route::get('/userform', [App\Http\Controllers\FormController::class,'index'])->name('userform');
Route::get('/get-employee-data', [App\Http\Controllers\EmployeeController::class,'index'])->name('getEmployeeData');
Route::get('/form-employee-data', [App\Http\Controllers\EmployeeController::class,'showForm'])->name('formEmployeeData');
Route::post('/store_form', [App\Http\Controllers\EmployeeController::class,'store'])->name('storeForm');
Route::post('/employee/{id}', [App\Http\Controllers\EmployeeController::class, 'update'])->name('updateForm');
Route::get('/employee/{id}/edit', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('editForm');
Route::put('/user/{id}', [App\Http\Controllers\FormController::class, 'update'])->name('userUpdate');

Route::get('/test_database', [App\Http\Controllers\EmployeeController::class,'store'])->name('testDb');

Route::get('/contacts', function () {
    return view('contacts', [
        'address' => 'some address',
        'post_code' => '12345',
        'email' => 'gmail@gmail.com',
        'phone' => '+1234567890'
    ]);
});
