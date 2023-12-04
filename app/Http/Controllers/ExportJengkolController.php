<?php

namespace App\Http\Controllers;

use App\Exports\LaporanHargaHarianJengkol;
use App\Exports\LaporanHargaPilihTanggalJengkol;
use App\Exports\LaporanMonitoringPengawasanInflasiJengkol;
use App\Exports\LaporanPerubahanHargaJengkol;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ExportJengkolController extends Controller
{
    public function exportLaporanHargaPilihTanggalJengkol(Request $request)
    {
       // Get the selected start and end dates from the form input
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        return Excel::download(new LaporanHargaPilihTanggalJengkol($startDate,$endDate), 'Laporan Harga Harian Pasar Jengkol.xlsx');
    }

    public function exportLaporanPerubahanHargaJengkol()
    {
       // Get the selected start and end dates from the form input
        return Excel::download(new LaporanPerubahanHargaJengkol, 'Laporan Perubahan Harga Pasar Jengkol.xlsx');
    }

    public function exportLaporanMonitoringPengawasanInflasiJengkol()
    {
       // Get the selected start and end dates from the form input
        return Excel::download(new LaporanMonitoringPengawasanInflasiJengkol, 'Laporan Monitoring Pengawasan Inflasi Pasar Jengkol.xlsx');
    }

    public function exportLaporanHargaHarianJengkol()
    {
       // Get the selected start and end dates from the form input
        return Excel::download(new LaporanHargaHarianJengkol, 'Laporan Harga Harian Pasar Jengkol.xlsx');
    }

    public function exportFormLaporanPilihTanggalJengkol()
    {
        return view('backend.pasar_jengkol.export.formlaporanhargatanggaljengkol', ['title' => 'LAPORAN HARGA HARIAN']);
    }

    public function index()
    {
        return view('backend.pasar_jengkol.export.index', ['title' => 'LAPORAN HARGA KOMODITAS PASAR JENGKOL']);
    }

}
