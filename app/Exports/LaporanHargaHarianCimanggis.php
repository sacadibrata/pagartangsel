<?php

namespace App\Exports;

use App\Models\DataSurveyor;
use App\Models\KomoditasCimanggis;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanHargaHarianCimanggis implements FromView
{

    public function view(): View
    {
        // Fetch data for the specified date range

        $komoditas = KomoditasCimanggis::with('pendataancimanggis')->get();

        $user = auth()->user();
        $pasar = DataSurveyor::where('user_id',$user->id)->first();

        return view('backend.pasar_cimanggis.export.laporanhargahariancimanggis', [
            'komoditas' => $komoditas,
            'pasar'=>$pasar,
        ]);
    }
}
