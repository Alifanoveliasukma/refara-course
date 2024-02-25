<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TailwindController extends Controller
{
    public function test(){
        return view('frontend.test');
    }
}
