<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PerlengkapanController;
use App\Http\Controllers\PermohonanSewaController;
use App\Http\Controllers\TransactionController;

// use App\Http\Controllers\JadwalGedungController;

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
    return redirect()->route('login'); // Redirect to login page
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); // Show login form
Route::post('/login', [LoginController::class, 'login'])->name('login.post'); // Process login
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Process logout
// Route::resource('admin.users', UserController::class);


Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard'); // Admin dashboard



    Route::resource('admin/kategori', KategoriController::class)->names([
        'index' => 'admin.kategori.index',
        'create' => 'admin.kategori.create',
        'store' => 'admin.kategori.store',
        'show' => 'admin.kategori.show',
        'edit' => 'admin.kategori.edit',
        'update' => 'admin.kategori.update',
        'destroy' => 'admin.kategori.destroy',
    ]);
    Route::resource('admin/perlengkapan', PerlengkapanController::class)->names([
        'index' => 'admin.perlengkapan.index',
        'create' => 'admin.perlengkapan.create',
        'store' => 'admin.perlengkapan.store',
        'show' => 'admin.perlengkapan.show',
        'edit' => 'admin.perlengkapan.edit',
        'update' => 'admin.perlengkapan.update',
        'destroy' => 'admin.perlengkapan.destroy',
    ]);
    Route::resource('admin/users', UserController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'show' => 'admin.users.show',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);
    // Route::resource('admin/transactions', TransactionController::class)->names([
    // 'index' => 'admin.transactions.getAdminTransactions',
    // 'create' => 'admin.users.create',
    // 'store' => 'admin.users.store',
    // 'show' => 'admin.users.show',
    // 'edit' => 'admin.users.edit',
    // 'update' => 'admin.users.update',
    // 'destroy' => 'admin.users.destroy',
    // ]);
});

// routes/web.php
Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');


Route::get('/admin/permohonan-sewas', [PermohonanSewaController::class, 'getAdminPermohonanSewa'])->name('admin.permohonansewa.getAdminPermohonanSewa'); // Process login
Route::get('/admin/permohonan-sewas/edit/{id}', [PermohonanSewaController::class, 'editAdminPermohonanSewa'])->name('admin.permohonansewa.editAdminPermohonanSewa'); // Process login
Route::put('/admin/permohonan-sewas/{id}', [PermohonanSewaController::class, 'updateAdminPermohonanSewa'])->name('admin.permohonansewa.updateAdminPermohonanSewa');
Route::get('/admin/transactions/', [TransactionController::class, 'getAdminTransactions'])->name('admin.transactions.getAdminTransactions');



// Route::get('/admin/permohonan-sewas', [PermohonanSewaController::class, 'editAdminPermohonanSewa'])->name('admin.permohonansewa.getpermohonans'); // Process login
// Route::get('/admin/permohonan_sewa/{id}/edit', 'PermohonanSewaController@editAdminPermohonanSewa')->name('admin.permohonansewa.editAdminPermohonanSewa');




// Route::get('/', function () {
//     return view('admin.dashboard');
// });

// Route::get('/', [LoginController::class, 'showLoginForm']);

// routes/web.php
// Route::post('/register', 'Auth\RegisterController@register')->name('register');

// Route::post('/register', [AuthController::class, 'register']);
// routes/web.php

// routes/web.php

// Route::get('/login', [LoginController::class, 'showLoginForm']);
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

// Route::post('/login', 'Auth\LoginController@login')->name('login.post');

// Route::post('logout', 'Auth\LoginController@logout')->name('logout');


// Route::post('/login', [AuthController::class, 'login']);

// Route::resource('kategori', KategoriController::class);
// Route::resource('admin/kategori', KategoriController::class)->middleware('auth');



// routes/web.php

// Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');




// Route::get('/penyewaan-gedung', [PenyewaanGedungController::class, 'index']);
// Route::post('/penyewaan-gedung', [PenyewaanGedungController::class, 'store']);
// Route::get('/penyewaan-gedung/{id}', [PenyewaanGedungController::class, 'show']);
// Route::put('/penyewaan-gedung/{id}', [PenyewaanGedungController::class, 'update']);
// Route::delete('/penyewaan-gedung/{id}', [PenyewaanGedungController::class, 'destroy']);


// Route::get('/penyewa-gedung', 'PenyewaGedungController@index');


// Route::apiResource('penyewa-gedung', PenyewaGedungController::class);
// Route::apiResource('jadwal-gedung', JadwalGedungController::class);
