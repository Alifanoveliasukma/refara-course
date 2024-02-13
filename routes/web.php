<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\PanelController;
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
    Route::put('/panel/kursus/proses-edit/{id}', [KursusController::class, 'proses_edit_kursus'])->name('kursus.prosesEdit');
<<<<<<< HEAD
=======
    Route::get('/panel/laporan-dari-manager', [PanelController::class, 'laporan_manager']);
>>>>>>> 10eef2daa13d5fce677b6889f2bb0074db309402
    });


Route::middleware(['guest:peserta'])->group(function () {
    Route::get('/login', [AuthController::class, 'halaman_login_peserta'])->name('login');
    Route::post('/proses-login',[AuthController::class, 'proseslogin']);
});

Route::middleware(['auth:peserta'])->group(function(){
    Route::get('/proses-logout-peserta',[AuthController::class, 'proseslogout']);
    Route::get('/dashboard',[AuthController::class, 'index']);
});

// peserta
Route::get('/', [AuthController::class, 'landing_page'])->name('landing_page');

Route::get('/register', [AuthController::class, 'registrasi'])->name('halaman_register');

Route::post('/proses-register', [AuthController::class, 'proses_register_peserta'])->name('register');


