<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StripeController extends Controller
{
    public function stripe(Request $request)
    {
        // simpan pada table pesanan
        $pesanan = Pesanan::where('id_peserta', Auth::user()->id)->where('status', 0)->first();
        $pesanan->status = 1;
        $pesanan->update();

        $status_cart = 1;
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
