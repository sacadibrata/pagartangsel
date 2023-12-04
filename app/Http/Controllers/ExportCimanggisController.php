<?php

namespace App\Http\Controllers;

use App\Exports\LaporanHargaHarianCimanggis;
use App\Exports\LaporanHargaHarianJengkol;
use App\Exports\LaporanHargaPilihTanggalCimanggis;
use App\Exports\LaporanHargaPilihTanggalCiputat;
use App\Exports\LaporanHargaPilihTanggalJengkol;
use App\Exports\LaporanMonitoringPengawasanInflasiCimanggis;
use App\Exports\LaporanPerubahanHargaCimanggis;
use App\Exports\LaporanPerubahanHargaJengkol;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ExportCimanggisController extends Controller
{
    public function exportLaporanHargaPilihTanggalCimanggis(Request $request)
    {
       // Get the selected start and end dates from the form input
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        return Excel::download(new LaporanHargaPilihTanggalCimanggis($startDate,$endDate), 'Laporan Harga Harian Pasar Cimanggis.xlsx');
    }

    public function exportLaporanPerubahanHargaCimanggis()
    {
       // Get the selected start and end dates from the form input
        return Excel::download(new LaporanPerubahanHargaCimanggis, 'Laporan Perubahan Harga Pasar Cimanggis.xlsx');
    }

    public function exportLaporanMonitoringPengawasanInflasiCimanggis()
    {
       // Get the selected start and end dates from the form input
        return Excel::download(new LaporanMonitoringPengawasanInflasiCimanggis, 'Laporan Monitoring Pengawasan Inflasi Pasar Cimanggis.xlsx');
    }

    public function exportLaporanHargaHarianCimanggis()
    {
       // Get the selected start and end dates from the form input
        return Excel::download(new LaporanHargaHarianCimanggis, 'Laporan Harga Harian Pasar Cimanggis.xlsx');
    }

    public function exportFormLaporanPilihTanggalCimanggis()
    {
        return view('backend.pasar_cimanggis.export.formlaporanhargatanggalcimanggis', ['title' => 'LAPORAN HARGA HARIAN']);
    }

    public function index()
    {
        return view('backend.pasar_cimanggis.export.index', ['title' => 'LAPORAN HARGA KOMODITAS PASAR CIMANGGIS']);
    }

}
