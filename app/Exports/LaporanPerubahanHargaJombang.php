<?php

namespace App\Exports;

use App\Models\DataSurveyor;
use App\Models\KomoditasJombang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanPerubahanHargaJombang implements FromView
{

    public function view(): View
    {
        // Fetch data for the specified date range

        $komoditas = KomoditasJombang::with('pendataanjombang')->get();

        $user = auth()->user();
        $pasar = DataSurveyor::where('user_id',$user->id)->first();

        return view('backend.pasar_jombang.export.laporanperubahanhargajombang', [
            'komoditas' => $komoditas,
            'pasar'=>$pasar,
        ]);
    }
}
