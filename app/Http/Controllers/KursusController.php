<?php

namespace App\Http\Controllers;

use App\Http\Requests\KursusRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Kursus;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Data;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KursusController extends Controller
{
    public function list_kursus()
    {
        
        $pesanan = Data::all();
        $contacts = Contact::all();
        $list_category = Category::all();
        $list_kursus = Kursus::with('category')->latest()->paginate(10);
        return view('kursus.index', compact('list_kursus','list_category', 'contacts','pesanan'));
    }
    public function create_kursus()
    {
        $category = Category::all();
        return view('kursus.create-kursus', compact('category'));
    }

    public function store_kursus(KursusRequest $request)
        {
            $validated = $request->validated();

            if ($request->hasFile('image')) {
                // put image in the public storage
                $filePath = Storage::disk('public')->put('images/posts/featured-images', request()->file('image'));
                $validated['image'] = $filePath;
            }

            // insert only requests that already validated in the StoreRequest
            $create = Kursus::create($validated);

            if($create) {
                // add flash for the success notification
                
                return redirect('/panel/data')->with('success', 'Kursus berhasil di tambah');
            }

            return abort(500);
        }

    public function edit_kursus(Request $request, $id)
    {
        $kursus = Kursus::findorfail($id);
        $category = Category::all();
        return view('kursus.edit-kursus',compact('kursus', 'category'));
    }


    public function proses_edit_kursus(UpdateRequest $request, $id)
    {
        $post = Kursus::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            // delete image
            Storage::disk('public')->delete($post->image);

            $filePath = Storage::disk('public')->put('images/posts/featured-images', request()->file('image'), 'public');
            $validated['image'] = $filePath;
        }
        $update = $post->update($validated);
        
        if($update) {
            session()->flash('notif.success', 'kursus updated successfully!');
            return redirect('/panel/data');
        }

        return abort(500);

    }

    public function delete_kursus($id)
    {
        $kursus = Kursus::find($id);
        $kursus->delete();
        return redirect('/panel/data')
                ->withSuccess('Kursus Berhasil Di Delete!');
    }

    public function detail_kursus($id)
    {
        return response()->view('kursus.show',[
            'kursus' => Kursus::findOrFail($id),
        ]);
    }

    public function aktifkan($id)
    {
        $status_masa_aktif = 0;
        try {
            $data = [
                'status_masa_aktif' => $status_masa_aktif,
            ];
            $simpan = DB::table('data_lengkap')->where('id', $id)->update($data);

            if($simpan){
                return redirect('/panel/data');
            }
        } catch (\Exception $e) {
            return redirect('panel/data')->with('success', 'kursus di aktif kan');
        }
        
    }

    public function non_aktifkan($id)
    {
        
        $pesanan_data = Data::where('kursus_id', $id)->first();
        $pesanan_data->delete();
        $pesanan_detail = PesananDetail::where('kursus_id', $id)->first();
        $pesanan_detail->delete();
        if($pesanan_detail && $pesanan_data){
            return redirect('/panel/data');
        }
        return redirect('/panel/data');


    }

    

}
