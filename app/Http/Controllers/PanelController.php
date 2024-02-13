<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function laporan_manager()
    {
        return view('panel.laporan-manager');
    }
}
