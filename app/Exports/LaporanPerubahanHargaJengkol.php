<?php

namespace App\Exports;

use App\Models\DataSurveyor;
use App\Models\KomoditasCeger;
use App\Models\KomoditasJengkol;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanPerubahanHargaJengkol implements FromView
{

    public function view(): View
    {
        // Fetch data for the specified date range

        $komoditas = KomoditasJengkol::with('pendataanjengkol')->get();

        $user = auth()->user();
        $pasar = DataSurveyor::where('user_id',$user->id)->first();

        return view('backend.pasar_jengkol.export.laporanperubahanhargajengkol', [
            'komoditas' => $komoditas,
            'pasar'=>$pasar,
        ]);
    }
}
