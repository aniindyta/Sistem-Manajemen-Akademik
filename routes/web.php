<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Models\Mahasiswa;
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

Route::get('/', DashboardController::class)->middleware('auth');

Route::controller(AuthController::class)->group(function(){
    Route::get('login', 'login')->name('login')->middleware('only_guest');
    Route::post('login', 'authenticating')->middleware('only_guest');
    Route::get('register', 'register')->middleware('only_guest');
    Route::post('register', 'registerProses')->middleware('only_guest');
});

Route::middleware('auth')->group(function(){
    Route::get('dashboard', DashboardController::class);
    Route::controller(MahasiswaController::class)->group(function(){
        Route::get('mahasiswa', 'mahasiswa')->name('mahasiswa');
        Route::get('addMahasiswa', 'addMahasiswa')->name('addMahasiswa')->middleware('can:isAdmin');
        Route::post('saveMahasiswa', 'saveMahasiswa')->name('saveMahasiswa')->middleware('can:isAdmin');
        Route::get('editMahasiswa{id}', 'editMahasiswa')->name('editMahasiswa')->middleware('can:isAdmin');
        Route::post('updateMahasiswa{id}', 'updateMahasiswa')->name('updateMahasiswa')->middleware('can:isAdmin');
        Route::get('deleteMahasiswa{id}', 'deleteMahasiswa')->name('deleteMahasiswa')->middleware('can:isAdmin');
    });
    
    Route::controller(DosenController::class)->group(function(){
        Route::get('dosen', 'dosen')->name('dosen');
        Route::get('addDosen', 'addDosen')->name('addDosen')->middleware('can:isAdmin');
        Route::post('saveDosen', 'saveDosen')->name('saveDosen')->middleware('can:isAdmin');;
        Route::get('editDosen{id}', 'editDosen')->name('editDosen')->middleware('can:isAdmin');;
        Route::post('updateDosen{id}', 'updateDosen')->name('updateDosen')->middleware('can:isAdmin');;
        Route::get('deleteDosen{id}', 'deleteDosen')->name('deleteDosen')->middleware('can:isAdmin');;
    });

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});