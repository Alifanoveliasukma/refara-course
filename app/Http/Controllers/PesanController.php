<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Data;
use App\Models\Kursus;
use App\Models\Pesanan;
use App\Models\Peserta;
use App\Models\Category;
use App\Models\History;
use Illuminate\Http\Request;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    public function detail_kursus(Request $request, $id)
    {
        // Mendapatkan ID pengguna yang sedang login
    $peserta_id = Auth::id();
    $user =  Auth::user()->id;
    // Mengambil kursus yang diklik oleh pengguna
    $kursus = Kursus::where('id', $id)->first();
        // dd($kursus->id);
    // $pesananExists = Pesanan::where('kursus_id', $kursus->id)->where('id_peserta', $peserta_id)->first();
    // dd($pesananExists);
    
    $pesananExists = PesananDetail::where('kursus_id', $kursus->id)->where('peserta_id', $peserta_id)->first();
        // dd($pesananDetail);
    
    
    
    // dd($kursus);
    // $pesananExists = Pesanan::whereHas('detail_pesanan', function ($query) use ($kursus) {
    //     $query->where('kursus_id', $kursus);
    // })->exists();
    // dd($pesananExists);
    // Memeriksa apakah kursus_id yang diklik oleh peserta yang sedang login ada di dalam Data
    $isPurchased = Data::where('peserta_id', $peserta_id)
        ->where('kursus_id', $kursus->id)
        ->exists();
        $user_id = Auth::id();
        $list_peserta = Peserta::where('id', $user_id)->first();
        $pesanan_id = $list_peserta->pesanan_id;
        $status_cart = $list_peserta->status_cart;
        $pesanan = Pesanan::where('id_peserta', $user)->where('status',0)->first();
        // dd($pesanan->kursus_id);
    
        if ($status_cart == 0) {
            if($pesanan_id == 1){
                // dd('status cartnya 0 tapi pesanan idnya 1');
                if ($isPurchased) {
                    $data = "true";
                    return view('kursus.detail', compact('data', 'kursus'));
                    // dd('Kursus ini telah dibeli oleh peserta yang sedang login.');
                } else {
                        $data = "false_2";
                        return view('kursus.detail', compact('data', 'kursus'));
                        // dd('Kursus ini belum dibeli oleh peserta yang sedang login.');
                }   
                    $data = "notfound";
                    return view('kursus.detail', compact('kursus', 'data'));

            }
            $data = "false_1_belum keranjang";
            // dd('status cart nya 0 ');
            return view('kursus.detail', compact('kursus', 'data'));
            
                
        } else {
            if($pesanan_id == 0){
                if($pesananExists){
                    // dd('ada di cart');
                    if($pesananExists->status == 0){
                        $data = "false_sudah_keranjang";
                        return view('kursus.detail', compact('kursus', 'data'));
                    }
                    $data = "false_6";
                    return view('kursus.detail', compact('kursus', 'data'));
                }
                // dd('ga ada di cart');
                    $data = "false_5";
                    return view('kursus.detail', compact('data', 'kursus'));
                // dd('status cartnya 1 tapi pesanan_idnya 0');
                
            } else {
                if ($isPurchased) {
                        $data = "true";
                        // dd('Kursus ini telah dibeli oleh peserta yang sedang login.');
                        return view('kursus.detail', compact('data', 'kursus'));
                        
                } else {
                    if($pesananExists == False){
                        $data = "false_3";
                        // dd('Kursus ini belum dibeli oleh peserta yang sedang login.');
                        return view('kursus.detail', compact('data', 'kursus'));
                    }elseif ($pesananExists){
                        $data = "false_sudah_keranjang";
                        return view('kursus.detail', compact('kursus', 'data'));
                    } else{
                        $data = "false_2";
                        // dd('Kursus ini belum dibeli oleh peserta yang sedang login.');
                        return view('kursus.detail', compact('data', 'kursus'));
                    }
                        
                        
                }
                    $data = "notfound";
                    return view('kursus.detail', compact('kursus', 'data'));
                
            }
        }
        return view('kursus.detail', compact('kursus'));
    }

    public function detail_kursus_fe(Request $request, $id)
    {
    $kursus = Kursus::all();
    $list_category = Category::all();
        // Mendapatkan ID pengguna yang sedang login
    $peserta_id = Auth::id();
    $user =  Auth::user()->id;
    // Mengambil kursus yang diklik oleh pengguna
    $kursus = Kursus::where('id', $id)->first();
        // dd($kursus->id);
    // $pesananExists = Pesanan::where('kursus_id', $kursus->id)->where('id_peserta', $peserta_id)->first();
    // dd($pesananExists);
    
    $pesananExists = PesananDetail::where('kursus_id', $kursus->id)->where('peserta_id', $peserta_id)->first();
        // dd($pesananDetail);
    
    
    
    // dd($kursus);
    // $pesananExists = Pesanan::whereHas('detail_pesanan', function ($query) use ($kursus) {
    //     $query->where('kursus_id', $kursus);
    // })->exists();
    // dd($pesananExists);
    // Memeriksa apakah kursus_id yang diklik oleh peserta yang sedang login ada di dalam Data
    $isPurchased = Data::where('peserta_id', $peserta_id)
        ->where('kursus_id', $kursus->id)
        ->exists();
        $user_id = Auth::id();
        $list_peserta = Peserta::where('id', $user_id)->first();
        $pesanan_id = $list_peserta->pesanan_id;
        $status_cart = $list_peserta->status_cart;
        $pesanan = Pesanan::where('id_peserta', $user)->where('status',0)->first();
        // dd($pesanan->kursus_id);
    
        if ($status_cart == 0) {
            if($pesanan_id == 1){
                // dd('status cartnya 0 tapi pesanan idnya 1');
                if ($isPurchased) {
                    $data = "true";
                    return view('frontend.kursus.detail', compact('data', 'kursus'));
                    // dd('Kursus ini telah dibeli oleh peserta yang sedang login.');
                } else {
                        $data = "false_2";
                        return view('frontend.kursus.detail', compact('data', 'kursus'));
                        // dd('Kursus ini belum dibeli oleh peserta yang sedang login.');
                }   
                    $data = "notfound";
                    return view('frontend.kursus.detail', compact('kursus', 'data'));

            }
            $data = "false_1_belum keranjang";
            // dd('status cart nya 0 ');
            return view('frontend.kursus.detail', compact('kursus', 'data'));
            
                
        } else {
            if($pesanan_id == 0){
                if($pesananExists){
                    // dd('ada di cart');
                    if($pesananExists->status == 0){
                        $data = "false_sudah_keranjang";
                        return view('frontend.kursus.detail', compact('kursus', 'data'));
                    }
                    $data = "false_6";
                    return view('frontend.kursus.detail', compact('kursus', 'data'));
                }
                // dd('ga ada di cart');
                    $data = "false_5";
                    return view('frontend.kursus.detail', compact('data', 'kursus'));
                // dd('status cartnya 1 tapi pesanan_idnya 0');
                
            } else {
                if ($isPurchased) {
                        $data = "true";
                        // dd('Kursus ini telah dibeli oleh peserta yang sedang login.');
                        return view('frontend.kursus.detail', compact('data', 'kursus'));
                        
                } else {
                    if($pesananExists == False){
                        $data = "false_3";
                        // dd('Kursus ini belum dibeli oleh peserta yang sedang login.');
                        return view('frontend.kursus.detail', compact('data', 'kursus'));
                    }elseif ($pesananExists){
                        $data = "false_sudah_keranjang";
                        return view('frontend.kursus.detail', compact('kursus', 'data'));
                    } else{
                        $data = "false_2";
                        // dd('Kursus ini belum dibeli oleh peserta yang sedang login.');
                        return view('frontend.kursus.detail', compact('data', 'kursus'));
                    }
                        
                        
                }
                    $data = "notfound";
                    return view('frontend.kursus.detail', compact('kursus', 'data'));
                
            }
        }
        return view('frontend.kursus.detail', compact('kursus'));
    }

    public function belajar_kursus($id)
    {

        $peserta_id = Auth::id();
        $kursus = Kursus::where('id', $id)->first();
        // dd($kursus->id);
        // Mengambil data dari tabel Data dengan kondisi peserta_id sesuai dengan pengguna yang sedang login
        $data = Data::where('peserta_id', $peserta_id)->first();
        // dd($data->kursus_id);
        // $data = Data::where('kursus_id', $content->id)->first();
        // $ceksama = Data::where('peserta_id', $peserta_id)
        // ->where('kursus_id', $kursus->id)
        // ->exists();

        // if ($ceksama) {
        //     $kursus_id = $ceksama->kursus_id;
        //     // Sekarang $kursus_id berisi nilai dari kolom kursus_id pada model Data
        //     dd($kursus_id);
        // }
        $ceksama = Data::where('peserta_id', $peserta_id)
        ->where('kursus_id', $kursus->id)
        ->first();

        if ($ceksama) {
            return view('peserta.belajar', compact('data', 'ceksama'));
            // dd($ceksama->kursus->nama_kursus);
            // Sekarang $kursus_nama berisi nilai dari kolom nama_kursus pada model Kursus yang terkait
            // dd($kursus_nama);
        }

        return view('peserta.belajar', compact('data'));
    }

    public function pesan(Request $request, $id)
    {

        $kursus = Kursus::where('id', $id)->first();
        $tanggal = Carbon::now();

       // cek validasi
       $cek_pesanan = Pesanan::where('id_peserta', Auth::user()->id)->where('status', 0)->first();

       //simpan ke database pesanan
       if(empty($cek_pesanan))
       {
            $pesanan = new Pesanan;
            $pesanan->id_peserta = Auth::user()->id;
            $pesanan->kursus_id = $kursus->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->nama_pesanan = "kursus refara";
            $pesanan->jumlah_harga = 0;
            $pesanan->save();
       }

        // simpan ke database pesanan detail
        $pesanan_baru = Pesanan::where('id_peserta', Auth::user()->id)->where('status', 0)->first();
         
        //cek pesanan detail
        $cek_pesanan_detail = PesananDetail::where('kursus_id', $kursus->id)->where('pesanan_id', $pesanan_baru->id)->first();
        if(empty($cek_pesanan_detail))
        {
            $pesanan_detail = new PesananDetail;
            $pesanan_detail->kursus_id = $kursus->id;
            $pesanan_detail->peserta_id = Auth::user()->id;
            $pesanan_detail->status = 0;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $kursus->harga_kursus*$request->jumlah_pesan;
            $pesanan_detail->save();
        }else{
            $pesanan_detail = PesananDetail::where('kursus_id', $kursus->id)->where('pesanan_id', $pesanan_baru->id)->first();
            $pesanan_detail->jumlah = $pesanan_detail->jumlah+$request->jumlah_pesan;

            //harga sekarang
            $harga_pesanan_detail_baru = $kursus->harga_kursus*$request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
            $pesanan_detail->update();

        }

        //jumlah total
        $pesanan = Pesanan::where('id_peserta', Auth::user()->id)->where('status', 0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga+$kursus->harga_kursus*$request->jumlah_pesan;
    $pesanan->update();

        
        $status_cart = 1;
        $id_peserta = Auth::user()->id;
        
        $data = [
            'status_cart' => $status_cart,
        ];

        $pesanan_detail = PesananDetail::where('id', Auth::user()->id)->first();

        // simpan ke database data lengkap
        // $data_lengkap = new Data;
        // $data_lengkap->peserta_id = Auth::user()->id;
        // $data_lengkap->kursus_id = $kursus->id;
        // $data_lengkap->pesanan_id = $pesanan_baru->id;
        // $data_lengkap->save();
        
        // Lakukan update data berdasarkan id_peserta
        $update = DB::table('list_peserta')
            ->where('id', $id_peserta)
            ->update($data);

        return redirect('/');
    }

    public function checkout_kursus_fe()
    {
        $peserta_id = Auth::id();
        // $pesanan = Pesanan::where('id_peserta', Auth::user()->id)->where('status',0)->first();
        // $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        // $kursus = $pesanan_details->kursus_id;
        // dd($kursus);
        // dd($pesanan_details);
        $pesanan_info = Pesanan::where('id_peserta', $peserta_id)->where('status', 0)->first();
        // dd($pesanan_info->nama_pesanan);
        $pesanan = PesananDetail::where('peserta_id', $peserta_id)->where('status', 0)->get();
        // dd($pesanan);
        // $pesanandetail = PesananDetail::where('pesanan_id', $pesanan)->get();
        // dd($pesanandetail);


        // $kursus = $pesananDetails->kursus;
        // $namaKursus = $kursus->nama_kursus;
        

        return view('frontend.pesan.checkout', compact('pesanan', 'pesanan_info'));
    }

    public function checkout_kursus()
    {
        $peserta_id = Auth::id();
        // $pesanan = Pesanan::where('id_peserta', Auth::user()->id)->where('status',0)->first();
        // $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        // $kursus = $pesanan_details->kursus_id;
        // dd($kursus);
        // dd($pesanan_details);
        $pesanan_info = Pesanan::where('id_peserta', $peserta_id)->where('status', 0)->first();
        // dd($pesanan_info->nama_pesanan);
        $pesanan = PesananDetail::where('peserta_id', $peserta_id)->where('status', 0)->get();
        // dd($pesanan);
        // $pesanandetail = PesananDetail::where('pesanan_id', $pesanan)->get();
        // dd($pesanandetail);


        // $kursus = $pesananDetails->kursus;
        // $namaKursus = $kursus->nama_kursus;
        // dd($pesanan);

        return view('pesan.checkout', compact('pesanan', 'pesanan_info'));
    }

    public function delete($id)
    {
        $pesanan_detail = PesananDetail::where('id', $id)->first();

        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
        $pesanan->update();

        $pesanan_detail->delete();

        // $status_cart = 0;
        // $id_peserta = Auth::user()->id;
        
        // $data = [
        //     'status_cart' => $status_cart,
        // ];
        
        // Lakukan update data berdasarkan id_peserta
        // $update = DB::table('list_peserta')
        //     ->where('id', $id_peserta)
        //     ->update($data);
        
        return redirect('/checkout')->withSuccess('pesanan sukses di hapus');;
    }

    public function riwayat_pesanan(){
        $peserta_id = Auth::id();
        $history = History::where('peserta_id', $peserta_id)->get();
        return view('pesan.history', compact('history'));
        // foreach ($history as $data) {
        //     // Mengakses relasi menggunakan relasi yang sudah didefinisikan di model
        //     $relasi = $data->kursus->nama_kursus;
        //     dd($relasi); // Ganti 'nama_relasi' dengan nama relasi yang sesuai
        //     // Lakukan sesuatu dengan relasi
        // }
       
    }

    public function send_owner($id)
    {
        $status_owner = 1;
        try {
            $data = [
                'status_owner' => $status_owner,
            ];
            $simpan = DB::table('data_lengkap')->where('id', $id)->update($data);

            if($simpan){
                return redirect('/panel/data');
            }
        } catch (\Exception $e) {
            return redirect('panel/data');
        }
    }
}