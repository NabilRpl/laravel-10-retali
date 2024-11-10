<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KloterController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\UserManajementController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [AuthController::class, 'index'])->name('login.index');
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [UserManajementController::class, 'index'])->name('dashboard');

    Route::get('/user', [UserManajementController::class, 'index'])->name('userManajement.index');
    Route::get('/user/create', [UserManajementController::class, 'create'])->name('userManajement.create');
    Route::post('/user', [UserManajementController::class, 'store'])->name('userManajement.store');
    Route::get('/user/{id}/edit', [UserManajementController::class, 'edit'])->name('userManajement.edit');
    Route::put('/user/{id}', [UserManajementController::class, 'update'])->name('userManajement.update');


    Route::get('/kloter/{id}', [KloterController::class, 'index'])->name('kloter.index');
    Route::get('/kloter/{id}/create', [KloterController::class, 'create'])->name('kloter.create');
    Route::post('/kloter/{id}', [KloterController::class, 'store'])->name('kloter.store');


    Route::get('/tugas/{id}', [TugasController::class, 'index'])->name('tugas.index');
    Route::get('/tugas/{id}/show', [TugasController::class, 'show'])->name('tugas.show');
});

