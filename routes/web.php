<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\Jenis_KelaminController;
use App\Http\Controllers\PasienController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/desa');
});

// Routes untuk Desa
Route::resource('desa', DesaController::class);
Route::get('/desa', [DesaController::class, 'index'])->name('desa.index');
Route::post('/desa', [DesaController::class, 'store'])->name('desa.store');
Route::delete('/desa/{id}', [DesaController::class, 'destroy'])->name('desa.destroy');
Route::get('/desa', [App\Http\Controllers\DesaController::class, 'index'])->name('desa.index');
Route::post('/desa/store', [App\Http\Controllers\DesaController::class, 'store'])->name('desa.store');
Route::delete('/desa/{id}', [App\Http\Controllers\DesaController::class, 'destroy'])->name('desa.destroy');
