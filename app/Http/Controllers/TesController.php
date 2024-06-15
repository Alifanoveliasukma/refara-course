<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\History;
use App\Models\Kursus;
use App\Models\Time;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TesController extends Controller
{
    public function tes_1(){
        
//         $startTime = time(); // Waktu sekarang dalam detik
// // dd($startTime);
// // Durasi waktu dalam menit
// $durationInMinutes = 1; // Durasi waktu dalam menit

// // Konversi durasi waktu menjadi detik
// $durationInSeconds = $durationInMinutes * 60; // Konversi menit ke detik

// // Waktu akhir adalah waktu awal ditambah durasi waktu dalam detik
// $endTime =  $durationInSeconds;
// dd($endTime);
// // Loop sampai waktu akhir tercapai
// while (time() < $endTime) {
//     // Hitung sisa waktu yang tersisa
//     $remainingTimeInSeconds = $endTime - time();

//     // Konversi sisa waktu ke dalam menit
//     $remainingTimeInMinutes = ceil($remainingTimeInSeconds / 60); // ceil digunakan untuk membulatkan ke atas

//     dd("Waktu tersisa: $remainingTimeInMinutes menit\r");
//     sleep(1); // Jeda 1 detik sebelum melakukan iterasi berikutnya
// }

// dd("Waktu telah berakhir!\n");
        $peserta_id = Auth::user()->id;
        $times = History::where('peserta_id', $peserta_id)->where('status', 0)->first();
        // dd($times->kursus->akses);
        
        $mutable = Carbon::now();
        $dateString = $mutable->format('Y-m-d H:i');
        return view('tes.tes_1', compact('dateString','times'));
        // $secondRow = $times->skip(5)->first();
        // dd($secondRow->created_at->format('Y-m-d H:i'));
//         if ($secondRow) {
//             $timeCreatedAt = $secondRow->created_at->format('Y-m-d H:i');
//             if ($timeCreatedAt === $dateString) {
//                 $pesananDetail = Data::findOrFail($id);
//                 $pesananDetail->delete();
//                 return redirect('/dashboard');
//             }
//         }

// return response()->json(['status' => 'belum_sama']);

        
        // $mutable = Carbon::now();
        // $dateString = $mutable->format('Y-m-d H:i');
        // dd($dateString);
        // $mutable = Carbon::now();
        // dd($mutable);
        // $times = Time::all();
        // $secondRow = $times->skip(3)->first(); // Mengambil baris kedua (indeks dimulai dari 0)
        // $tes = $secondRow->created_at->format('Y-m-d H:i');
        // // dd($tes);
        // if ($tes == $dateString){
        //     dd('sudah sama');
        //     $pesanan = History::where('status', 0)->first();
        //     $pesanan->status = 1;
        //     $pesanan->update();
        // }
        // dd('belum sama');

        // $lulu = '2024-03-20 09:24:00';
        // dd($secondRow->created_at == $dateString);

        // $mutable = Carbon::now();
        // $immutable = CarbonImmutable::now();
        // $modifiedMutable = $mutable->add(1, 'day');
        // $modifiedImmutable = CarbonImmutable::now()->add(1, 'day');

        // dd($modifiedMutable);
        // var_dump($modifiedMutable === $mutable);             // bool(true)
        // var_dump($mutable->isoFormat('dddd D'));             // string(11) "Thursday 14"
        // var_dump($modifiedMutable->isoFormat('dddd D'));     // string(11) "Thursday 14"
        // // So it means $mutable and $modifiedMutable are the same object
        // // both set to now + 1 day.
        // var_dump($modifiedImmutable === $immutable);         // bool(false)
        // var_dump($immutable->isoFormat('dddd D'));           // string(12) "Wednesday 13"
        // var_dump($modifiedImmutable->isoFormat('dddd D'));   // string(11) "Thursday 14"
        // While $immutable is still set to now and cannot be changed and
        // $modifiedImmutable is a new instance created from $immutable
        // set to now + 1 day.

        // $mutable = CarbonImmutable::now()->toMutable();
        // var_dump($mutable->isMutable());                     // bool(true)
        // var_dump($mutable->isImmutable());                   // bool(false)
        // $immutable = Carbon::now()->toImmutable();
        // var_dump($immutable->isMutable());                   // bool(false)
        // var_dump($immutable->isImmutable());                 // bool(true)
    }

    public function delete(Request $request){
        
    }

    public function setAlarm(Request $request){
            $time = new Time();
            $time->time_column = $request->time_column;
            $time->save();
            return redirect('/tes-fitur-1');

    }

    public function tes_2(Request $request)
    {
        $input_minutes = $request->input('minutes');
        $seconds = $input_minutes * 60;

        sleep($seconds);

        return view('alarm.alert');
    }
}
