<?php

namespace App\Exports;

use App\Models\DataSurveyor;
use App\Models\KomoditasCiputat;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanMonitoringPengawasanInflasiCiputat implements FromView
{

    public function view(): View
    {
        // Fetch data for the specified date range

        $komoditas = KomoditasCiputat::with('pendataanciputat')->get();

        $user = auth()->user();
        $pasar = DataSurveyor::where('user_id',$user->id)->first();

        $alasan = DB::table('alasan_kenaikan_harga_ciputats')
                ->join('komoditas', 'alasan_kenaikan_harga_ciputats.komoditas_id','komoditas.id')
                ->join('reason_ciputats', 'alasan_kenaikan_harga_ciputats.reason_id','reason_ciputats.id')
                ->select('alasan_kenaikan_harga_ciputats.komoditas_id','komoditas.id as id_komoditas','reason_ciputats.id as id_reason','alasan_kenaikan_harga_ciputats.tanggal_input as tanggal_input','reason_ciputats.nama_alasan as nama_alasan')
                ->orderBy('alasan_kenaikan_harga_ciputats.tanggal_input', 'asc')
                ->get();

        return view('backend.pasar_ciputat.export.laporan-monitoring-pengawasan-inflasi-ciputat', [
            'komoditas' => $komoditas,
            'alasan' => $alasan,
            'pasar'=>$pasar,
        ]);
    }
}
