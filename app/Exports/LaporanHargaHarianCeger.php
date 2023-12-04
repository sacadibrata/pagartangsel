<?php

namespace App\Exports;

use App\Models\DataSurveyor;
use App\Models\KomoditasCeger;
use App\Models\KomoditasCiputat;
use App\Models\KomoditasSerpong;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanHargaHarianCeger implements FromView
{

    public function view(): View
    {
        // Fetch data for the specified date range

        $komoditas = KomoditasCeger::with('pendataanceger')->get();

        $user = auth()->user();
        $pasar = DataSurveyor::where('user_id',$user->id)->first();

        return view('backend.pasar_ceger.export.laporanhargaharianceger', [
            'komoditas' => $komoditas,
            'pasar'=>$pasar,
        ]);
    }
}
