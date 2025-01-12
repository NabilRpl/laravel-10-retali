<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\KloterController;
use App\Http\Controllers\kontenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\UserManajementController;

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
    Route::get('user/dashboard', [DashboardController::class, 'dashboard'])->name('user.dashboard');

    Route::get('/user', [UserManajementController::class, 'index'])->name('userManajement.index');
    Route::get('/user/create', [UserManajementController::class, 'create'])->name('userManajement.create');
    Route::post('/user', [UserManajementController::class, 'store'])->name('userManajement.store');
    Route::get('/user/{id}/edit', [UserManajementController::class, 'edit'])->name('userManajement.edit');
    Route::delete('/user/{id}/delete', [UserManajementController::class, 'destroy'])->name('userManajement.destroy');
    Route::put('/user/{id}', [UserManajementController::class, 'update'])->name('userManajement.update');
    Route::get('/user/{id}/remind', [UserManajementController::class, 'remindTask'])->name('userManajement.remind');


    Route::get('/kloter/{id}', [KloterController::class, 'index'])->name('kloter.index');
    Route::get('/kloter/{id}/create', [KloterController::class, 'create'])->name('kloter.create');
    Route::post('/kloter/{id}', [KloterController::class, 'store'])->name('kloter.store');


    Route::get('/tugas/{id}', [TugasController::class, 'index'])->name('tugas.index');
    Route::get('/tugas/{id}/show', [TugasController::class, 'show'])->name('tugas.show');

    Route::get('/tugaskonten', [kontenController::class, 'index'])->name('tugaskonten.index');
    Route::get('/tugaskonten/create', [kontenController::class, 'create'])->name('tugaskonten.create');
    Route::post('/tugaskonten', [kontenController::class, 'store'])->name('tugaskonten.store');
    Route::delete('/konten/deleteFoto/{foto}', [kontenController::class, 'deleteFoto'])->name('konten.deleteFoto');
    Route::delete('/konten/deleteVideo/{video}', [kontenController::class, 'deleteVideo'])->name('konten.deleteVideo');

    Route::get('/userkonten/{id}', [kontenController::class, 'userkonten'])->name('tugaskonten.userkonten');
    Route::get('/detailuserkonten/{id}', [kontenController::class, 'detailuserkonten'])->name('tugaskonten.detailuserkonten');

    Route::get('/datatable/{id}', [TableController::class, 'index'])->name('datatable.index');

    Route::resource('groups', GroupsController::class);


});

