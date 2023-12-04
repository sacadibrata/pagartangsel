<?php

namespace App\Exports;

use App\Models\DataSurveyor;
use App\Models\KomoditasSemuaPasar;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanPerubahanHargaAll implements FromView
{

    public function view(): View
    {
        // Fetch data for the specified date range

        $komoditas = KomoditasSemuaPasar::with('pendataansemuapasar')->get();

        $user = auth()->user();
        $pasar = DataSurveyor::where('user_id',$user->id)->first();

        return view('backend.admin.export.laporanperubahanhargaall', [
            'komoditas' => $komoditas,
            'pasar'=>$pasar,
        ]);
    }
}
