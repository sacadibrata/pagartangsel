<?php

namespace App\Exports;

use App\Models\DataSurveyor;
use App\Models\KomoditasCiputat;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanHargaHarianCiputat implements FromView
{

    public function view(): View
    {
        // Fetch data for the specified date range

        $komoditas = KomoditasCiputat::with('pendataanciputat')->get();

        $user = auth()->user();
        $pasar = DataSurveyor::where('user_id',$user->id)->first();

        return view('backend.pasar_ciputat.export.laporanhargaharianciputat', [
            'komoditas' => $komoditas,
            'pasar'=>$pasar,
        ]);
    }
}
