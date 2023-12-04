<?php

namespace App\Exports;

use App\Models\DataSurveyor;
use App\Models\KomoditasCeger;
use App\Models\KomoditasJengkol;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanMonitoringPengawasanInflasiJengkol implements FromView
{

    public function view(): View
    {
        // Fetch data for the specified date range

        $komoditas = KomoditasJengkol::with('pendataanjengkol')->get();

        $user = auth()->user();
        $pasar = DataSurveyor::where('user_id',$user->id)->first();

        $alasan = DB::table('alasan_kenaikan_harga_jombangs')
                ->join('komoditas', 'alasan_kenaikan_harga_jombangs.komoditas_id','komoditas.id')
                ->join('reason_jombangs', 'alasan_kenaikan_harga_jombangs.reason_id','reason_jombangs.id')
                ->select('alasan_kenaikan_harga_jombangs.komoditas_id','komoditas.id as id_komoditas','reason_jombangs.id as id_reason','alasan_kenaikan_harga_jombangs.tanggal_input as tanggal_input','reason_jombangs.nama_alasan as nama_alasan')
                ->orderBy('alasan_kenaikan_harga_jombangs.tanggal_input', 'asc')
                ->get();

        return view('backend.pasar_jengkol.export.laporan-monitoring-pengawasan-inflasi-jengkol', [
            'komoditas' => $komoditas,
            'alasan' => $alasan,
            'pasar'=>$pasar,
        ]);
    }
}
