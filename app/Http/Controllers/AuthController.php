<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Kursus;
use App\Models\Payment;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AuthController extends Controller
{

    // peserta

    public function landing_page()
    {
        $kursus = Kursus::all();
        $list_category = Category::all();
        return view('landing_page.landing_page', compact('kursus', 'list_category'));
    }

    public function search(Request $request)
    {
    // menangkap data search
    $list_category = Category::all();
    $list_kursus = Kursus::all();
    $search = $request->search;
    
        // mengambil data dari table pegawai sesuai pencarian data
    $kursus = DB::table('content_course')
    ->where('nama_kursus','like',"%".$search."%")
    ->paginate();
    
        // mengirim data pegawai ke view landing_page
    return view('landing_page.landing_page', compact('kursus','list_kursus','list_category'));
    
    }

    public function fetching_kursus($nama_category)
    {
        if(Category::where('nama_category', $nama_category)->exists())
        {
            $kategori = Category::where('nama_category', $nama_category)->first();
            $kursus = Kursus::where('category_id', $kategori->id)->where('status',0)->get();
            return view('kursus.display', compact('kursus', 'kategori'));
        } else {
            return redirect('/')->with('status', 'Kategori tidak ada');
        }
        
    }

    public function registrasi()
    {
        return view('auth.register');
    }

    public function proses_register_peserta(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'no_telp' => ['required', 'string', 'regex:/^[0-9\-\+\(\)]{7,20}$/'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ], [
            'nama.required' => 'Harap isi nama Anda.',
            'email.required' => 'Harap isi alamat email Anda.',
            'email.email' => 'Alamat email tidak valid.',
            'email.max' => 'Alamat email terlalu panjang.',
            'email.unique' => 'Alamat email sudah digunakan.',
            'no_telp.required' => 'Harap isi nomor telepon Anda.',
            'no_telp.regex' => 'Format nomor telepon tidak valid.',
            'password.required' => 'Harap isi kata sandi Anda.',
            'password.min' => 'Kata sandi harus memiliki minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.'
        ]);

        $peserta = Peserta::create([
            'nama' => request('nama'),
            'email' => request('email'),
            'no_telp' => request('no_telp'),
            'password' => Hash::make(request('password'))
        ]);

        Auth::login($peserta);

        return redirect('/login')->with('success', 'Pendaftaran berhasil!');
    }

    public function halaman_login_peserta()
    {
        return view('auth.login');
    }

    public function proseslogin(Request $request)
    {
        if(Auth::guard('peserta')->attempt(['email' => $request->email, 'password'=> $request->password])) {
            return redirect('/dashboard');
        } else {
            return redirect('/')->with(['warning' => 'Email / Password Salah']);
        }
    }

    public function proseslogout(){
        if(Auth::guard('peserta')->check()){
            Auth::guard('peserta')->logout();
            return redirect('/');
        }
    }

    public function index()
    {
        $pesanan = Pesanan::where('id_peserta', Auth::user()->id)->where('status', 1)->get();
        $list_peserta = Peserta::where('id', Auth::user()->id)->first();
        
        if ($pesanan->isNotEmpty()) {
            // Jika ada pesanan yang terkait dengan pengguna saat ini
            $pesanan_peserta = PesananDetail::whereIn('pesanan_id', $pesanan->pluck('id'))->get();
            return view('peserta.dashboard', compact('pesanan_peserta', 'pesanan'));
        } else {
            // Jika tidak ada pesanan yang terkait dengan pengguna saat ini
            $data_lain = "Data lain yang ingin ditampilkan jika tidak ada pesanan terkait";
            return view('peserta.dashboard', compact('data_lain'));
        }
        
    }

    
    // user dan manager

    public function login_panel()
    {
        return view('auth.login-panel');
    }

    public function proses_login_panel(Request $request)
    {
        if(Auth::guard('user')->attempt(['email'=> $request->email, 'password' => $request->password])){
            return redirect('/panel/dashboard-panel');
        } else {
            return redirect('/panel')->with(['warning' => 'Email / Password Salah']);
        }
    }

    public function proses_logout_panel(){ 
        if(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
            return redirect('/panel');
        }
    }

    public function panel_dashboard()
    {
        $list_category = Category::all();
        $list_kursus = Kursus::all();
        return view('kursus.index', compact('list_category','list_kursus'));
    }

    
}
