<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\PesanController;
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



// panel
Route::middleware(['guest:user'])->group(function () {
    Route::get('/panel', [AuthController::class, 'login_panel'])->name('loginadmin');
    Route::post('/proses-login-panel',[AuthController::class, 'proses_login_panel']);
});

Route::middleware(['auth:user'])->group(function(){
    Route::get('/proses-logout-panel',[AuthController::class, 'proses_logout_panel']);
    Route::get('/panel/dashboard-panel',[AuthController::class, 'panel_dashboard']);
    
    // owner

    Route::get('/panel/kursus/list-kursus',[KursusController::class, 'list_kursus']);
    Route::get('/panel/kursus/create-kursus',[KursusController::class, 'create_kursus']);
    Route::post('/panel/kursus/proses-create',[KursusController::class, 'store_kursus']);
    Route::get('/panel/kursus/edit-kursus/{id}',[KursusController::class, 'edit_kursus']);
    Route::delete('/panel/kursus/delete-kursus/{id}',[KursusController::class, 'delete_kursus'])->name('kursus.delete');
    Route::put('/panel/kursus/proses-edit/{id}', [KursusController::class, 'proses_edit_kursus'])->name('kursus.prosesEdit');
    Route::get('/panel/laporan-dari-manager', [PanelController::class, 'laporan_manager']);
    
    });


Route::middleware(['guest:peserta'])->group(function () {
    Route::get('/login', [AuthController::class, 'halaman_login_peserta'])->name('login');
    Route::post('/proses-login',[AuthController::class, 'proseslogin']);
    Route::get('/register', [AuthController::class, 'registrasi'])->name('halaman_register');
    Route::post('/proses-register', [AuthController::class, 'proses_register_peserta'])->name('register');
});

Route::middleware(['auth:peserta'])->group(function(){
    Route::get('/proses-logout-peserta',[AuthController::class, 'proseslogout']);
    Route::get('/dashboard',[AuthController::class, 'index']);

    // Pesanan
    Route::get('/detail-kursus/{id}', [PesanController::class, 'detail_kursus']);
    Route::post('/pesan/{id}', [PesanController::class, 'pesan']);
});

Route::get('/', [AuthController::class, 'landing_page'])->name('landing_page');




