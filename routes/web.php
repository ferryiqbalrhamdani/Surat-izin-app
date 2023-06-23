<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AtasanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\SuratIzinController;
use App\Http\Controllers\UserController;
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

Route::get('/', function() {
    return back();
})->middleware('auth');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginAction']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'registerAction']);


Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
    
    Route::middleware(['role:1'])->group(function () {

        Route::get('dashboard', [DashboardController::class, 'index']);
        Route::get('daftar-pt', [AdminController::class, 'daftarPT']);
        Route::post('tambah-pt', [AdminController::class, 'daftarPTAction']);
        Route::delete('delete/pt/{id}', [AdminController::class, 'destroyPT']);
        Route::get('ubah/pt/{id}', [AdminController::class, 'updatePT']);
        Route::post('ubah/pt/{id}', [AdminController::class, 'updatePTAction']);
        
        Route::get('daftar-divisi', [AdminController::class, 'daftarDivisi']);
        Route::post('tambah-divisi', [AdminController::class, 'daftarDivisiAction']);
        Route::delete('delete/divisi/{id}', [AdminController::class, 'destroyDivisi']);
        Route::get('ubah/divisi/{id}', [AdminController::class, 'updateDivisi']);
        Route::post('ubah/divisi/{id}', [AdminController::class, 'updateDivisiAction']);
    });

    
    Route::get('users', [UserController::class, 'index']);
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.delete');

    
    Route::middleware(['role:2'])->group(function () {
        Route::get('surat-izin', [AdminController::class, 'suratIzin']);
        Route::get('form-izin', [AdminController::class, 'formIzin']);
        Route::post('form-izin', [AdminController::class, 'formIzinAction']);
        Route::get('cetak-pdf', [PdfController::class, 'cetakPDF']);
        Route::get('surat-izin/ubah/{id}', [SuratIzinController::class, 'update']);
    });

    Route::middleware(['role:3'])->group(function () {
        Route::get('daftar-surat-izin', [AtasanController::class, 'index']);
        Route::post('surat-izin/approved/{id}', [AtasanController::class, 'approved']);
        Route::post('surat-izin/reject/{id}', [AtasanController::class, 'reject']);
        Route::post('surat-izin/pending/{id}', [AtasanController::class, 'pending']);
        Route::get('daftar-surat-izin/ubah/{id}', [AtasanController::class, 'ubah']);
    });

    
});