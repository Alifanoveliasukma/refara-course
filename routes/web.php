<?php

use App\Http\Controllers\AuthController;
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
Route::get('/panel/dashboard_panel',[AuthController::class, 'panel_dashboard']);

// peserta
Route::get('/', function () {
    return view('auth.login');
});
Route::post('/proses-login',[AuthController::class, 'proseslogin']);
Route::get('/dashboard',[AuthController::class, 'index']);

