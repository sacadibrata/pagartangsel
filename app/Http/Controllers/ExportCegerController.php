<?php

namespace App\Http\Controllers;

use App\Exports\CustomPendataansByDateExport;
use App\Exports\LaporanHargaHarianCeger;
use App\Exports\LaporanHargaHarianSerpong;
use App\Exports\LaporanHargaPilihTanggalCeger;
use App\Exports\LaporanMonitoringPengawasanInflasiCeger;
use App\Exports\LaporanPerubahanHargaCeger;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ExportCegerController extends Controller
{
    public function exportLaporanHargaPilihTanggalCeger(Request $request)
    {
       // Get the selected start and end dates from the form input
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        return Excel::download(new LaporanHargaPilihTanggalCeger($startDate,$endDate), 'Laporan Harga Harian Pasar Ceger.xlsx');
    }

    public function exportLaporanPerubahanHargaCeger()
    {
       // Get the selected start and end dates from the form input
        return Excel::download(new LaporanPerubahanHargaCeger, 'Laporan Perubahan Harga Pasar Ceger.xlsx');
    }

    public function exportLaporanMonitoringPengawasanInflasiCeger()
    {
       // Get the selected start and end dates from the form input
        return Excel::download(new LaporanMonitoringPengawasanInflasiCeger, 'Laporan Monitoring Pengawasan Inflasi Pasar Ceger.xlsx');
    }

    public function exportLaporanHargaHarianCeger()
    {
       // Get the selected start and end dates from the form input
        return Excel::download(new LaporanHargaHarianCeger, 'Laporan Harga Harian Pasar Ceger.xlsx');
    }

    public function exportFormLaporanPilihTanggalCeger()
    {
        return view('backend.pasar_ceger.export.formlaporanhargatanggalceger', ['title' => 'LAPORAN HARGA HARIAN']);
    }

    public function index()
    {
        return view('backend.pasar_ceger.export.index', ['title' => 'LAPORAN HARGA KOMODITAS PASAR CEGER']);
    }

}
