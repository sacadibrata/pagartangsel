<?php

namespace App\Exports;

use App\Models\DataSurveyor;
use App\Models\KomoditasSerpong;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanPerubahanHargaSerpong implements FromView
{

    public function view(): View
    {
        // Fetch data for the specified date range

        $komoditas = KomoditasSerpong::with('pendataanserpong')->get();

        $user = auth()->user();
        $pasar = DataSurveyor::where('user_id',$user->id)->first();

        return view('backend.pasar_serpong.export.laporanperubahanhargaserpong', [
            'komoditas' => $komoditas,
            'pasar'=>$pasar,
        ]);
    }
}
