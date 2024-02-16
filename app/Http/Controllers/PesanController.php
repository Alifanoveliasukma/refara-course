<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    public function detail_kursus($id)
    {
        $kursus = Kursus::where('id', $id)->first();
        return view('kursus.detail', compact('kursus'));
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
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
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

        return redirect('/');
    }

    public function checkout_kursus()
    {
        $pesanan = Pesanan::where('id_peserta', Auth::user()->id)->where('status',0)->first();
        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();

        return view('pesan.checkout', compact('pesanan', 'pesanan_details'));
    }

    public function delete($id)
    {
        $pesanan_detail = PesananDetail::where('id', $id)->first();

        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
        $pesanan->update();

        $pesanan_detail->delete();
        
        return redirect('/checkout')->withSuccess('pesanan sukses di hapus');;
    }
}
