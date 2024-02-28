<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function laporan_manager()
    {
        $laporan = Data::all()->where('status_owner', 1);
        return view('panel.laporan-manager', compact('laporan'));
    }
}
