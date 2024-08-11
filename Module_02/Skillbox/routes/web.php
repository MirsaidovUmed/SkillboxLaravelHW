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
Route::delete('/employee/{id}', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('deleteEmployee');
Route::get('/test_database', [App\Http\Controllers\EmployeeController::class,'store'])->name('testDb');
// Route::put('/user/{id}', [App\Http\Controllers\FormController::class, 'update'])->name('userUpdate');

Route::get('/users-all', [App\Http\Controllers\UserController::class,'index'])->name('getUsersAll');
Route::get('/user/{id}', [App\Http\Controllers\UserController::class,'getUserById'])->name('getUsersById');
Route::get('/create-user', [App\Http\Controllers\UserController::class,'showUserForm'])->name('showUserForm');
Route::post('/create-user', [App\Http\Controllers\UserController::class,'create'])->name('createUser');
Route::get('/user-pdf/{id}', [App\Http\Controllers\PdfGeneratorController::class,'index'])->name('getUsersPDF');

Route::get('/get-books-data', [App\Http\Controllers\BookController::class,'index'])->name('getBooksData');
Route::get('/module6',[App\Http\Controllers\BookController::class,'show'])->name('showModule6');
Route::post('/module6',[App\Http\Controllers\BookController::class,'store'])->name('storeModule6');

Route::get('/contacts', function () {
    return view('contacts', [
        'address' => 'some address',
        'post_code' => '12345',
        'email' => 'gmail@gmail.com',
        'phone' => '+1234567890'
    ]);
});
