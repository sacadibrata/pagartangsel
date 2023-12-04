<?php

namespace App\Exports;

use App\Models\DataSurveyor;
use App\Models\KomoditasCeger;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanMonitoringPengawasanInflasiCeger implements FromView
{

    public function view(): View
    {
        // Fetch data for the specified date range

        $komoditas = KomoditasCeger::with('pendataanceger')->get();

        $user = auth()->user();
        $pasar = DataSurveyor::where('user_id',$user->id)->first();

        $alasan = DB::table('alasan_kenaikan_harga_cegers')
                ->join('komoditas', 'alasan_kenaikan_harga_cegers.komoditas_id','komoditas.id')
                ->join('reason_cegers', 'alasan_kenaikan_harga_cegers.reason_id','reason_cegers.id')
                ->select('alasan_kenaikan_harga_cegers.komoditas_id','komoditas.id as id_komoditas','reason_cegers.id as id_reason','alasan_kenaikan_harga_cegers.tanggal_input as tanggal_input','reason_cegers.nama_alasan as nama_alasan')
                ->orderBy('alasan_kenaikan_harga_cegers.tanggal_input', 'asc')
                ->get();

        return view('backend.pasar_ceger.export.laporan-monitoring-pengawasan-inflasi-ceger', [
            'komoditas' => $komoditas,
            'alasan' => $alasan,
            'pasar'=>$pasar,
        ]);
    }
}
