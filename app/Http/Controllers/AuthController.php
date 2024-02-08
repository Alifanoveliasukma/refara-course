<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('peserta.dashboard');
    }
    public function proseslogin(Request $request)
    {
        if(Auth::guard('peserta')->attempt(['email' => $request->email, 'password'=> $request->password])) {
            return redirect('/dashboard');
        } else {
            echo "Gagal Login";
        }
    }
}
