<?php

namespace App\Exports;

use App\Models\DataSurveyor;
use App\Models\KomoditasCiputat;
use App\Models\KomoditasSerpong;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanHargaHarianSerpong implements FromView
{

    public function view(): View
    {
        // Fetch data for the specified date range

        $komoditas = KomoditasSerpong::with('pendataanserpong')->get();

        $user = auth()->user();
        $pasar = DataSurveyor::where('user_id',$user->id)->first();

        return view('backend.pasar_serpong.export.laporanhargaharianserpong', [
            'komoditas' => $komoditas,
            'pasar'=>$pasar,
        ]);
    }
}
