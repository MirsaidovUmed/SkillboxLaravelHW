<?php

use App\Events\UserRegistered;
use App\Http\Controllers\ProfileController;
use App\Listeners\UserRegisteredListener;
use App\Mail\Welcome;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/users-all', [App\Http\Controllers\UserController::class,'index'])->name('getUsersAll');
Route::get('/user/{id}', [App\Http\Controllers\UserController::class,'getUserById'])->name('getUsersById');
Route::get('/create-user', [App\Http\Controllers\UserController::class,'showUserForm'])->name('showUserForm');
Route::post('/create-user', [App\Http\Controllers\UserController::class,'create'])->name('createUser');
Route::get('/user-pdf/{id}', [App\Http\Controllers\PdfGeneratorController::class,'index'])->name('getUsersPDF');
