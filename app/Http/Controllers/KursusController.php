<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    public function list_kursus()
    {
        $list_kursus = Kursus::all();
        return view('kursus.index', compact('list_kursus'));
    }
    public function create_kursus()
    {
        return view('kursus.create-kursus');
    }

    public function store_kursus(Request $request)
        {
            // Validasi input
            $request->validate([
                'nama_kursus' => ['required', 'string', 'max:255'],
                'nama_pembuat' => ['required', 'string', 'max:255'],
                'deskripsi_kursus' => ['required', 'string'],
                'harga_kursus' => ['required', 'integer', 'min:0']
            ]);
    
            // Simpan data kursus ke database
            $kursus = Kursus::create([
                'nama_kursus' => $request->nama_kursus,
                'nama_pembuat' => $request->nama_pembuat,
                'deskripsi_kursus' => $request->deskripsi_kursus,
                'harga_kursus' => $request->harga_kursus
            ]);
    
            // Redirect ke halaman yang sesuai
            return redirect('/kursus/list-kursus');
        }

    public function edit_kursus(Kursus $kursus
    )
    {
        // $kursus = Kursus::findorfail($id);
        return view('kursus.edit-kursus',compact('kursus'));
    }


    public function update_kursus(Request $request, Kursus $kursus, $id)
    {
        $request->validate([
            'nama_kursus' => ['required', 'string', 'max:255'],
            'nama_pembuat' => ['required', 'string', 'max:255'],
            'deskripsi_kursus' => ['required', 'string'],
            'harga_kursus' => ['required', 'integer', 'min:0']
        ]);

        // $kursus = Kursus::findorfail($id);
        $kursus->update($request->all());
        return redirect('/kursus/list-kursus')->with('success', 'Kursus telah terupdate');
    }

}
