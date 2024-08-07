<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PermohonanSewaController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PerlengkapanController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PembayaranMidtransController;
use App\Http\Controllers\SnapController;

// use App\Http\Controllers\PermohonanSewaController;

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

// Route::post('/create-transaction', [PembayaranController::class, 'createTransaction']);
// Route::post('/payment/token', [PembayaranController::class, 'getTokenFromServer']);

// Route::post('/pembayaran/token', [PembayaranController::class, 'getTokenFromServer']);
// routes/web.php
// Route::post('/api/get-snap-token', [PembayaranController::class, 'getTokenFromServer']);
Route::post('/api/snap/token', [SnapController::class, 'getToken']);
Route::post('/api/get-token', [PembayaranController::class, 'getTokenFromServer']);


// Route::post('/api/get-snap-token', [PembayaranController::class, 'getTokenFromServer']);



Route::post('/get-snap-token', [PembayaranMidtransController::class, 'getTokenFromServer']);





Route::post('/get-token', [MidtransController::class, 'getToken']);

// Route::post('/create-transaction-token', [MidtransController::class, 'createTransactionToken']);
// Route::post('/handle-notification', [MidtransController::class, 'handleNotification']);

Route::get('kategoris/{id}', [KategoriController::class, 'show']);
Route::get('vendors/{id}', [VendorController::class, 'show']);
// routes/api.php
// Route::get('/permohonan_sewa/{id}/perlengkapan', [PermohonanSewaController::class, 'getPerlengkapanByPivot']);
// Route::get('/permohonan_sewa/{id}/perlengkapan', [PermohonanSewaController::class, 'getPerlengkapanByPermohonanId']);



// Route::get('/perlengkapans', [PerlengkapanController::class, 'index']);
// Route::get('/permohonan_sewa/{id}/status', [PermohonanSewaController::class, 'getStatus']);
// Route::apiResource('permohonan-sewa-perlengkapans', PermohonanSewaPerlengkapanController::class);

// Route::post('/permohonan_sewa/{id}/approve', [PermohonanSewaController::class, 'approve']);

Route::get('/permohonan_sewa/{id}/perlengkapan', [PermohonanSewaController::class, 'getPerlengkapanByPermohonan']);


Route::get('/permohonan_sewa/{id}', [PermohonanSewaController::class, 'show']);
Route::get('/permohonan_sewa/{id}/status', [PermohonanSewaController::class, 'getStatus']);
// Route::get('/permohonan_sewa/{id}/perlengkapan', [PermohonanSewaController::class, 'getPerlengkapan']);
// Route::get('/permohonan_sewa_perlengkapan/{id}', [PermohonanSewaController::class, 'getPerlengkapan']);





Route::get('/kategoris', [KategoriController::class, 'getKategoris']);
Route::get('/vendors', [VendorController::class, 'getVendors']);
Route::get('/perlengkapans', [PerlengkapanController::class, 'getPerlengkapans']);
Route::post('/vendors', [VendorController::class, 'store']);
// routes/api.php
Route::post('/permohonan-sewas', [PermohonanSewaController::class, 'store']);


// Route::post('permohonan-sewas', PermohonanSewaController::class);
Route::apiResource('permohonan-sewas', PermohonanSewaController::class);
// Route::apiResource('perlengkapans', PerlengkapanController::class);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
