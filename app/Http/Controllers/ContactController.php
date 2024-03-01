<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // public function index()
    // {
    //     // Mengambil semua pesan dari model Contact
    //     $contacts = Contact::all();

    //     // Mengirimkan data pesan ke tampilan
    //     return view('kursus.index', compact('contacts'));
    // }
    public function contact(Request $request)
    {
    
        // Validasi input
       $request->validate([
            'nama' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);
// dd($request);
        // Simpan pesan ke database
        $contact = Contact::create([
            'nama' => $request->nama,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'message' =>$request->message,
        ]);

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!, kami akan membalas balasan di email kamu ya!');
    } 

    public function contact_us(Request $request)
    {
    
        // Validasi input
       $request->validate([
            'nama' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);
// dd($request);
        // Simpan pesan ke database
        $contact = Contact::create([
            'nama' => $request->nama,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'message' =>$request->message,
        ]);

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!, kami akan membalas balasan di email kamu ya!');
    } 
}
