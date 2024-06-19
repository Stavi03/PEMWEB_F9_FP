<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\PengelolaDashboardController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\SampahController;


// start landing page
Route::middleware(['guest'])->group(function () {
    Route::get('/', [LandingPageController::class, 'homepage']);
});
Route::get('/sampahor', [LandingPageController::class, 'sampahor'])->name('sampahor');
Route::get('/sampahpl', [LandingPageController::class, 'sampahpl'])->name('sampahpl');
Route::get('/sampahkc', [LandingPageController::class, 'sampahkc'])->name('sampahkc');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);
// end landing page


// start user
Route::middleware(['auth'])->group(function () {

    Route::get('/user', [UserDashboardController::class, 'index'])->name('user');
    // Route::get('/user/tes', [UserDashboardController::class, 'datauser'])->name('user');
    // Route::get('/pembayaran', [UserDashboardController::class, 'pembayaran'])->name('pembayaran');

});
// end user


// start admin
Route::middleware(['auth', 'adminakses'])->group(function () {

    Route::get('/admin', [AdminDashboardController::class, 'index']);

    // Route::resource('/admin/tagihan', PembayaranController::class);
    // Route::get('/admin/tagihan', [AdminDashboardController::class, 'tagihan'])->name('admin.tagihan');
    Route::get('/admin/limbah', [TagihanController::class, 'index'])->name('admin.tagihan');
    Route::get('/admin/data-warga', [AdminDashboardController::class, 'datawarga']);

    Route::get('/admin/input', [SampahController::class, 'index'])->name('admin.input');
    Route::post('/admin/input', [SampahController::class, 'store'])->name('admin.input.store');

    Route::get('/admin/ubah-data/{id}', [AdminDashboardController::class, 'edit'])->name('admin.edit-data');
    Route::post('/admin/ubah-data/{id}', [AdminDashboardController::class, 'update'])->name('admin.edit-data.update');

    Route::resource('/admin', AdminDashboardController::class,);
    Route::post('/admin/data-baru', [AdminDashboardController::class, 'store'])->name('admin.data-baru.store');
    Route::delete('/admin/data-baru/{id}', [AdminDashboardController::class, 'destroy'])->name('admin.data-baru.destroy');

})->name('admin');
// end admin


// start pengelola
Route::middleware(['auth', 'pengelolaakses'])->group(function () {

Route::get('/pengelola', [PengelolaDashboardController::class, 'index'])->name('pengelola');
// Route::get('/pengelola', [PengelolaDashboardController::class, 'pengelola']);

});
// end pengelola

