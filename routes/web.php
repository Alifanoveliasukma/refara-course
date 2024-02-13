<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KursusController;
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
Route::get('/panel', [AuthController::class, 'login_panel']);
Route::post('/proses-login-panel',[AuthController::class, 'proses_login_panel']);
Route::get('/panel/dashboard-panel',[AuthController::class, 'panel_dashboard']);

// owner
Route::get('/panel/kursus/list-kursus',[KursusController::class, 'list_kursus']);
Route::get('/panel/kursus/create-kursus',[KursusController::class, 'create_kursus']);
Route::post('/panel/kursus/proses-create',[KursusController::class, 'store_kursus']);
Route::get('/panel/kursus/edit-kursus/{id}',[KursusController::class, 'edit_kursus']);
Route::put('/panel/kursus/proses-edit/{id}', [KursusController::class, 'proses_edit_kursus'])->name('kursus.prosesEdit');

// peserta
Route::get('/', [AuthController::class, 'landing_page'])->name('landing_page');
Route::get('/register', [AuthController::class, 'registrasi'])->name('halaman_register');
Route::post('/proses-register', [AuthController::class, 'proses_register_peserta'])->name('register');
Route::get('/login', [AuthController::class, 'halaman_login_peserta']);
Route::post('/proses-login',[AuthController::class, 'proseslogin']);
Route::get('/dashboard',[AuthController::class, 'index']);

