<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StripeController extends Controller
{
    public function cek(Request $request)
    {
        // $peserta_id = Auth::user()->id;
        // $pesanan_details = PesananDetail::where('peserta_id', $peserta_id)->where('status', 0)->get();
        //     // Simpan setiap objek ke dalam tabel lain
        //     $pesanan_details->each(function ($pesanan_detail) {
        //         Data::create([
        //             'peserta_id' => $pesanan_details->peserta_id,
        //             'kursus_id' => $pesanan_details->kursus_id,
        //             'pesanan_id' => $pesanan_details->pesenan_id,
        //         ]);
        //     });
    

        // $pesanan_detail = PesananDetail::where('peserta_id', $peserta_id)->where('status', 0)->get();

        // // dd($pesanan_detail);
        // foreach ($pesanan_detail as $pesanan_details) {
        //     // Lakukan operasi atau manipulasi data sesuai kebutuhan
        // // dd($pesanan_details);
        //     // Simpan objek ke dalam tabel lain
        //     Data::create([
        //         'peserta_id' => $pesanan_details->peserta_id,
        //         'kursus_id' => $pesanan_details->kursus_id,
        //         'pesanan_id' => $pesanan_details->pesenan_id,
        //         // ... tambahkan kolom lain sesuai kebutuhan
                
        //     ]);
        // }
        // dd($pesanan_detail);
        // dd($peserta_id);
        // $pesanan_id = Pesanan::where('id_peserta', $peserta_id)->first();
        //  dd($pesanan_id->id);
        // $pesanan_kursus = Pesanan::where('id_peserta', Auth::user()->id)->where('status', 1)->first();
        // // dd($pesanan_kursus->kursus_id);
        // $data_lengkap = new Data;
        // $data_lengkap->peserta_id = Auth::user()->id;
        // $data_lengkap->kursus_id = $pesanan_kursus->kursus_id;
        // $data_lengkap->pesanan_id = $pesanan_id->id;
        // $data_lengkap->save();
    }
    public function stripe(Request $request)
    {
        $peserta_id = Auth::user()->id;
        // dd($peserta_id);
        // $pesanan_id_data = Pesanan::where('id_peserta', $peserta_id)->where('status',0)->first();
        //  dd($pesanan_id_data->kursus_id);
        $pesanan_detail = PesananDetail::where('peserta_id', $peserta_id)->where('status', 0)->first();
        // dd($pesanan_detail);
        // dd($pesanan_kursus->kursus_id);
        // simpan pada table pesanan
        $pesanan_id = Pesanan::where('id_peserta', Auth::user()->id)->where('status', 0)->first();
        // dd($pesanan_id->id);
        // $data_lengkap = new Data;
        // $data_lengkap->peserta_id = Auth::user()->id;
        // $data_lengkap->kursus_id = $pesanan_detail->kursus_id;
        // $data_lengkap->pesanan_id = $pesanan_id->id;
        // $data_lengkap->save();
        // dd($data_lengkap->kursus_id);
        $pesanan_details = PesananDetail::where('peserta_id', $peserta_id)->where('status', 0)->get();

        // Simpan setiap objek ke dalam tabel lain
        $pesanan_details->each(function ($pesanan_detail) {
            Data::create([
                'peserta_id' => $pesanan_detail->peserta_id,
                'kursus_id' => $pesanan_detail->kursus_id,
                'pesanan_id' => $pesanan_detail->pesanan_id,
                // ... tambahkan kolom lain sesuai kebutuhan
            ]);
        });

        $pesanan = Pesanan::where('id_peserta', Auth::user()->id)->where('status', 0)->first();
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan = PesananDetail::where('peserta_id', Auth::user()->id)->where('status', 0)->get();

        $pesanan->each(function ($item) {
            // Mengubah nilai kolom status pada setiap objek PesananDetail
            $item->status = 1;
            $item->save();
        });

        // $status_cart = 1;
        $pesanan_id = 1;
        $id_peserta = Auth::user()->id;
        
        $data = [
            'pesanan_id' => $pesanan_id,
        ];
        
        // Lakukan update data berdasarkan id_peserta
        $update = DB::table('list_peserta')
            ->where('id', $id_peserta)
            ->update($data);

        // simpan pada table payment
        $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));
        $response = $stripe->checkout->sessions->create([
        'line_items' => [
            [
            'price_data' => [
                'currency' => 'idr',
                'product_data' => [
                    'name' => $request->product_name,
                ],
                'unit_amount' => $request->price*100,
            ],
            'quantity' => 1,
            ],
        ],
        'mode' => 'payment',
        'success_url' => route('success').'?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => route('cancel'),
        ]);
        //dd($response);
        if(isset($response->id) && $response->id != ''){
            session()->put('product_name', $request->product_name);
            session()->put('quantity', $request->quantity);
            session()->put('price', $request->price);
            return redirect($response->url);
        } else{
            return redirect()->route('cancel');
        }

        
        
    }

    public function success(Request $request)
    {
        if(isset($request->session_id)) {

            $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));
            $response = $stripe->checkout->sessions->retrieve($request->session_id);
            // dd($response);

            $payment = new Payment();
            $payment->payment_id = $response->id;
            $payment->product_name = session()->get('product_name');
            $payment->quantity = session()->get('quantity');
            $payment->amount = session()->get('price');
            $payment->currency = $response->currency;
            $payment->customer_name = $response->customer_details->name;
            $payment->customer_email = $response->customer_details->email;
            $payment->payment_status = $response->status;
            $payment->payment_method = "Stripe";
            $payment->save();

            return redirect('/dashboard')->with('success', 'Pembayaran berhasil');

            session()->forget('product_name');
            session()->forget('quantity');
            session()->forget('price');

        } else {
            return redirect()->route('cancel');
        }
    }

    public function cancel(Request $request)
    {
        return "Pembayaran di cancel.";
    }
}
