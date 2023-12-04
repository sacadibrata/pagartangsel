<?php

namespace App\Http\Controllers;

use App\Exports\LaporanHargaHarianJombang;
use App\Exports\LaporanHargaPilihTanggalJombang;
use App\Exports\LaporanMonitoringPengawasanInflasiJombang;
use App\Exports\LaporanPerubahanHargaJombang;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ExportJombangController extends Controller
{
    public function exportLaporanHargaPilihTanggalJombang(Request $request)
    {
       // Get the selected start and end dates from the form input
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        return Excel::download(new LaporanHargaPilihTanggalJombang($startDate,$endDate), 'Laporan Harga Harian Pasar Jombang.xlsx');
    }

    public function exportLaporanPerubahanHargaJombang()
    {
       // Get the selected start and end dates from the form input
        return Excel::download(new LaporanPerubahanHargaJombang, 'Laporan Perubahan Harga Pasar Jombang.xlsx');
    }

    public function exportLaporanMonitoringPengawasanInflasiJombang()
    {
       // Get the selected start and end dates from the form input
        return Excel::download(new LaporanMonitoringPengawasanInflasiJombang, 'Laporan Monitoring Pengawasan Inflasi Pasar Jombang.xlsx');
    }

    public function exportLaporanHargaHarianJombang()
    {
       // Get the selected start and end dates from the form input
        return Excel::download(new LaporanHargaHarianJombang, 'Laporan Harga Harian Pasar Jombang.xlsx');
    }

    public function exportFormLaporanPilihTanggalJombang()
    {
        return view('backend.pasar_jombang.export.formlaporanhargatanggaljombang', ['title' => 'LAPORAN HARGA HARIAN']);
    }

    public function index()
    {
        return view('backend.pasar_jombang.export.index', ['title' => 'LAPORAN HARGA KOMODITAS PASAR JOMBANG']);
    }

}
