<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Illuminate\Http\Request;

class TailwindController extends Controller
{
    public function test(){
        return view('frontend.test');
    }

    public function cari(){
        $kursus = Kursus::all();
        return view('frontend.cari', compact('kursus'));
    }
}
