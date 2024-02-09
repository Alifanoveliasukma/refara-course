<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{

    // peserta

    public function landing_page()
    {
        return view('landing_page.landing_page');
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

        return redirect('/login')->with('success', 'Pendaftaran berhasil!');;
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

    public function index()
    {
        return view('peserta.dashboard');
    }

    
    // user dan manager

    public function login_panel()
    {
        return view('auth.login-panel');
    }

    public function proses_login_panel(Request $request)
    {
        if(Auth::guard('user')->attempt(['email'=> $request->email, 'password' => $request->password])){
            return redirect('/panel/dashboard_panel');
        } else {
            return redirect('/panel')->with(['warning' => 'Email / Password Salah']);
        }
    }

    public function panel_dashboard()
    {
        return view('panel.dashboard');
    }

    
}
