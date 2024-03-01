<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontendContorller;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\TailwindController;
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

// Tailwind
Route::get('/test', [TailwindController::class, 'test']);
ROute::get('/login-peserta', [AuthController::class, 'login_page']);
Route::get('/',[AuthController::class, 'landing_page_fe']);
Route::get('/search', [AuthController::class, 'search_fe']);
Route::post('/contact-us', [ContactController::class, 'contact_us']);
Route::get('/beranda', [AuthController::class, 'beranda']);



// panel
Route::middleware(['guest:user'])->group(function () {
    Route::get('/panel', [AuthController::class, 'login_panel'])->name('loginadmin');
    Route::post('/proses-login-panel',[AuthController::class, 'proses_login_panel']);
});

Route::middleware(['auth:user'])->group(function(){
    Route::get('/proses-logout-panel',[AuthController::class, 'proses_logout_panel']);
    Route::get('/panel/dashboard-panel',[AuthController::class, 'panel_dashboard']);

    // owner

    Route::get('/panel/data',[KursusController::class, 'list_kursus']);
    Route::get('/panel/kursus/create-kursus',[KursusController::class, 'create_kursus']);
    Route::post('/panel/kursus/proses-create',[KursusController::class, 'store_kursus'])->name('store.kursus');
    Route::get('/panel/kursus/edit-kursus/{id}',[KursusController::class, 'edit_kursus']);
    Route::delete('/panel/kursus/delete-kursus/{id}',[KursusController::class, 'delete_kursus'])->name('kursus.delete');
    Route::put('/panel/kursus/proses-edit/{id}', [KursusController::class, 'proses_edit_kursus'])->name('kursus.prosesEdit');
    Route::get('/panel/kursus/show/{id}', [KursusController::class, 'detail_kursus']);
    Route::get('/panel/laporan-dari-manager', [PanelController::class, 'laporan_manager']);
    
    //category
    Route::get('/panel/category/list-category', [CategoryController::class, 'list_category']);
    Route::get('/panel/category/create-category', [CategoryController::class, 'create_category']);
    Route::post('/panel/category/proses-create',[CategoryController::class, 'store_category']);
    Route::get('/panel/category/edit-category/{id}',[CategoryController::class, 'edit_category']);
    Route::delete('/panel/category/delete-category/{id}',[CategoryController::class, 'delete_category'])->name('category.delete');
    Route::put('/panel/category/proses-edit/{id}', [CategoryController::class, 'proses_edit_category'])->name('category.prosesEdit');
    Route::get('/panel/category/show/{id}', [KursusController::class, 'kategori_kursus']);

    //manager
    Route::get('/status-kursus/aktif/{id}', [KursusController::class, 'aktifkan']);
    Route::get('/status-kursus/non-aktif/{id}', [KursusController::class, 'non_aktifkan']);
    Route::get('/send-report/{id}', [PesanController::class, 'send_owner']);

    });


    //peserta

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
    //front end pesanan 
    Route::get('/detail-kursus-fe/{id}', [PesanController::class, 'detail_kursus_fe']);


    //backend pesanan
    // Route::get('/detail-kursus/{id}', [PesanController::class, 'detail_kursus']);
    Route::post('/pesan/{id}', [PesanController::class, 'pesan']);
    Route::get('/checkout', [PesanController::class, 'checkout_kursus']);
    Route::delete('/checkout-delete/{id}',[PesanController::class, 'delete']);
    Route::get('/konfirmasi-checkout', [PesanController::class, 'checkout-konfirmasi']);
    Route::get('/dashboard/riwayat-pesanan', [PesanController::class, 'riwayat_pesanan']);

    // kursus yang dibeli
    Route::get('/dashboard/kursus/{id}', [PesanController::class, 'belajar_kursus']);

    // Stripe
    Route::post('/stripe', [StripeController::class, 'stripe'])->name('session');
    Route::get('/success', [StripeController::class, 'success'])->name('success');
    Route::get('/cancel', [StripeController::class, 'cancel'])->name('cancel');
    
    Route::get('/cek', [StripeController::class, 'cek']);
    // landing page
});

// Route::get('/', [AuthController::class, 'landing_page'])->name('landing_page');
Route::get('/search', [AuthController::class, 'search']);
Route::get('/category/{nama_category}', [AuthController::class, 'fetching_kursus']);
Route::post('/contact', [ContactController::class, 'contact'])->name('contact');





