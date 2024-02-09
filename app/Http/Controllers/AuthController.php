<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login_panel(){
        return view('auth.login-panel');
    }

    public function index()
    {
        return view('peserta.dashboard');
    }

    public function panel_dashboard()
    {
        return view('panel.dashboard');
    }
    public function proseslogin(Request $request)
    {
        if(Auth::guard('peserta')->attempt(['email' => $request->email, 'password'=> $request->password])) {
            return redirect('/dashboard');
        } else {
            return redirect('/')->with(['warning' => 'Email / Password Salah']);
        }
    }

    public function proses_login_panel(Request $request)
    {
        if(Auth::guard('user')->attempt(['email'=> $request->email, 'password' => $request->password])){
            return redirect('/panel/dashboard_panel');
        } else {
            return redirect('/panel')->with(['warning' => 'Email / Password Salah']);
        }
    }
}
