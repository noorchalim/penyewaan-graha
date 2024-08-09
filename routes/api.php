<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PermohonanSewaController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PerlengkapanController;

use App\Http\Controllers\TransactionController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json($request->user());
});

Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'getCurrentUser']);
Route::post('/transactions', [TransactionController::class, 'store']);


Route::get('kategoris/{id}', [KategoriController::class, 'show']);
Route::get('vendors/{id}', [VendorController::class, 'show']);

Route::get('/permohonan_sewa/{id}/perlengkapan', [PermohonanSewaController::class, 'getPerlengkapanByPermohonan']);


Route::get('/permohonan_sewa/{id}', [PermohonanSewaController::class, 'show']);
Route::get('/permohonan_sewa/{id}/status', [PermohonanSewaController::class, 'getStatus']);

Route::get('/kategoris', [KategoriController::class, 'getKategoris']);
Route::get('/vendors', [VendorController::class, 'getVendors']);
Route::get('/perlengkapans', [PerlengkapanController::class, 'getPerlengkapans']);
Route::post('/vendors', [VendorController::class, 'store']);
Route::post('/permohonan-sewas', [PermohonanSewaController::class, 'store']);

Route::apiResource('permohonan-sewas', PermohonanSewaController::class);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
