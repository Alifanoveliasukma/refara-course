<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Kursus;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    public function list_kursus()
    {
        $list_kursus = Kursus::with('category')->latest()->paginate(10);;
        return view('kursus.index', compact('list_kursus'));
    }
    public function create_kursus()
    {
        $category = Category::all();
        return view('kursus.create-kursus', compact('category'));
    }

    public function store_kursus(Request $request)
        {
            // Validasi input
            $request->validate([
                'nama_kursus' => ['required', 'string', 'max:255'],
                'nama_pembuat' => ['required', 'string', 'max:255'],
                'deskripsi_kursus' => ['required', 'string'],
                'harga_kursus' => ['required', 'integer', 'min:0'],
                'category_id' => 'required|exists:App\Models\Category,id',
            ]);
    
            // Simpan data kursus ke database
            $kursus = Kursus::create([
                'nama_kursus' => $request->nama_kursus,
                'nama_pembuat' => $request->nama_pembuat,
                'deskripsi_kursus' => $request->deskripsi_kursus,
                'harga_kursus' => $request->harga_kursus,
                'category_id' => $request->category_id,
            ]);
    
            // Redirect ke halaman yang sesuai
            return redirect('/panel/kursus/list-kursus')->with('success', 'Kursus Telah Berhasil!');
        }

    public function edit_kursus(Request $request, $id)
    {
        $kursus = Kursus::findorfail($id);
        $category = Category::all();
        return view('kursus.edit-kursus',compact('kursus', 'category'));
    }


    public function proses_edit_kursus(Request $request, $id)
    {

        $kursus = Kursus::findorfail($id);
        $kursus->update($request->all());
        // $request->validate([
        //     'nama_kursus' => 'required|string|min:5',
        //     'nama_pembuat' => 'required|string',
        //     'deskripsi_kursus' => 'required|string|min:10',
        //     'harga_kursus' => 'required|numeric',
        // ]);

        // // Temukan kursus yang akan diubah berdasarkan ID
        // $kursus = Kursus::findOrFail($id);

        // // Update data kursus
        // $kursus->update([
        //     'nama_kursus' => $request->nama_kursus,
        //     'nama_pembuat' => $request->nama_pembuat,
        //     'deskripsi_kursus' => $request->deskripsi_kursus,
        //     'harga_kursus' => $request->harga_kursus,
        // ]);

        // Redirect ke halaman index atau halaman lainnya setelah berhasil diubah
        return redirect('panel/kursus/list-kursus');
    }

    public function delete_kursus($id)
    {
        $kursus = Kursus::find($id);
        $kursus->delete();
        return redirect('/panel/kursus/list-kursus')
                ->withSuccess('Kursus Berhasil Di Delete!');
    }

}
