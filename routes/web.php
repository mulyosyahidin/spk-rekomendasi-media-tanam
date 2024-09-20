<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['middleware' => ['auth', 'role:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('kriteria', \App\Http\Controllers\Admin\KriteriaController::class);
    Route::resource('tanaman', \App\Http\Controllers\Admin\TanamanController::class);
    Route::resource('media-tanam', \App\Http\Controllers\Admin\MediaTanamController::class)->except('show');
    Route::resource('sistem-tanam', \App\Http\Controllers\Admin\SistemTanamController::class)->except('show');

    Route::controller(\App\Http\Controllers\Admin\SubKriteriaController::class)->prefix('sub-kriteria')->as('sub-kriteria.')->group(function () {
        Route::get('/{kriterium}', 'show')->name('show');
        Route::post('/{kriterium}', 'store')->name('store');
        Route::delete('/{kriterium}', 'destroy')->name('destroy');
    });

    Route::controller(\App\Http\Controllers\Admin\KarakteristikTanaman::class)->prefix('karakteristik-tanaman')->as('karakteristik-tanaman.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{tanaman}', 'edit')->name('edit');
        Route::patch('/{tanaman}', 'update')->name('update');
    });

    Route::controller(\App\Http\Controllers\Admin\PerhitunganController::class)->prefix('perhitungan')->as('perhitungan.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{tanaman}', 'show')->name('show');

        Route::get('/{tanaman}/matrix-keputusan', 'matrixKeputusan')->name('matrix-keputusan');
        Route::get('/{tanaman}/matrix-normalisasi', 'matrixNormalisasi')->name('matrix-normalisasi');
        Route::get('/{tanaman}/matrix-optimalisasi', 'matrixOptimalisasi')->name('matrix-optimalisasi');
        Route::get('/{tanaman}/pemeringkatan', 'pemeringkatan')->name('pemeringkatan');

        Route::post('/{tanaman}/simpan', 'simpan')->name('simpan');
        Route::get('/{tanaman}/hasil', 'hasil')->name('hasil');
    });

    Route::controller(\App\Http\Controllers\Admin\AlternatifController::class)->prefix('alternatif')->as('alternatif.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{media_tanam}/{sistem_tanam}', 'show')->name('show');

        Route::get('/{media_tanam}/{sistem_tanam}/nilai-sub-kriteria/{kriteria}', 'editNilaiSubKriteria')->name('nilai-sub-kriteria');
        Route::post('/{media_tanam}/{sistem_tanam}/nilai-sub-kriteria/{kriteria}', 'updateNilaiSubKriteria')->name('nilai-sub-kriteria');
    });
});

Route::group(['middleware' => ['auth', 'role:user'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/dashboard', [\App\Http\Controllers\User\DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__ . '/auth.php';
