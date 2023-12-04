<?php

namespace App\Exports;

use App\Models\DataSurveyor;
use App\Models\KomoditasCimanggis;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanMonitoringPengawasanInflasiCimanggis implements FromView
{

    public function view(): View
    {
        // Fetch data for the specified date range

        $komoditas = KomoditasCimanggis::with('pendataancimanggis')->get();

        $user = auth()->user();
        $pasar = DataSurveyor::where('user_id',$user->id)->first();

        $alasan = DB::table('alasan_kenaikan_harga_cimanggis')
                ->join('komoditas', 'alasan_kenaikan_harga_cimanggis.komoditas_id','komoditas.id')
                ->join('reason_cimanggis', 'alasan_kenaikan_harga_cimanggis.reason_id','reason_cimanggis.id')
                ->select('alasan_kenaikan_harga_cimanggis.komoditas_id','komoditas.id as id_komoditas','reason_cimanggis.id as id_reason','alasan_kenaikan_harga_cimanggis.tanggal_input as tanggal_input','reason_cimanggis.nama_alasan as nama_alasan')
                ->orderBy('alasan_kenaikan_harga_cimanggis.tanggal_input', 'asc')
                ->get();

        return view('backend.pasar_cimanggis.export.laporan-monitoring-pengawasan-inflasi-cimanggis', [
            'komoditas' => $komoditas,
            'alasan' => $alasan,
            'pasar'=>$pasar,
        ]);
    }
}
