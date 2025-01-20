<?php

use App\Http\Controllers\ApiAgendaController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiJamaahController;
use App\Http\Controllers\ApiKloterController;
use App\Http\Controllers\ApiKontenController;
use App\Http\Controllers\ApiTableController;
use App\Http\Controllers\ApiTugasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [ApiAuthController::class, 'login']);

Route::middleware([\App\Http\Middleware\authApi::class])->group(function () {
    Route::post('/logout', [ApiAuthController::class, 'logout']);

    Route::get('/user', [ApiAuthController::class, 'getuser']);
    Route::put('/user', [ApiAuthController::class, 'update']);
    Route::get('/kloter', [ApiKloterController::class, 'index']);

    Route::post('/tugas', [ApiTugasController::class, 'store']);

    Route::post('/userkonten', [ApiKontenController::class, 'storeUserKonten']);
    
    Route::post('/datatable', [ApiTableController::class, 'store']);
    Route::get('/getalldatatable', [ApiTableController::class, 'allDataTable']);

    Route::get('/jamaah', [ApiJamaahController::class, 'index']);
});

Route::get('/tugaskonten', [ApiKontenController::class, 'allKonten']);
Route::get('/tugaskonten/{id}', [ApiKontenController::class, 'detailKonten']);


Route::get('/agenda', [ApiAgendaController::class, 'index']);

