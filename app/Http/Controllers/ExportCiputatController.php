<?php

namespace App\Http\Controllers;

use App\Exports\CustomPendataansByBetweenDateExport;
use App\Exports\CustomPendataansByBetweenDateExportCiputat;
use App\Exports\CustomPendataansByDateExport;
use App\Exports\CustomPendataansByTodayYesterday;
use App\Exports\CustomPendataansByTodayYesterdayCiputat;
use App\Exports\CustomPendataansExport;
use App\Exports\LaporanHargaHarianCiputat;
use App\Exports\LaporanHargaPilihTanggalCiputat;
use App\Exports\LaporanMonitoringPengawasanInflasiCiputat;
use App\Exports\LaporanPerubahanHargaCiputat;
use App\Exports\PendataansExport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class ExportCiputatController extends Controller
{

    public function exportLaporanHargaPilihTanggalCiputat(Request $request)
    {
       // Get the selected start and end dates from the form input
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        return Excel::download(new LaporanHargaPilihTanggalCiputat($startDate,$endDate), 'Laporan Harga Harian Pasar Ciputat.xlsx');
    }

    public function exportLaporanPerubahanHargaCiputat()
    {
       // Get the selected start and end dates from the form input
        return Excel::download(new LaporanPerubahanHargaCiputat, 'Laporan Perubahan Harga Pasar Ciputat.xlsx');
    }

    public function exportLaporanMonitoringPengawasanInflasiCiputat()
    {
       // Get the selected start and end dates from the form input
        return Excel::download(new LaporanMonitoringPengawasanInflasiCiputat, 'Laporan Monitoring Pengawasan Inflasi Pasar Ciputat.xlsx');
    }

    public function exportLaporanHargaHarianCiputat()
    {
       // Get the selected start and end dates from the form input
        return Excel::download(new LaporanHargaHarianCiputat, 'Laporan Harga Harian Pasar Ciputat.xlsx');
    }

    public function exportFormLaporanPilihTanggalCiputat()
    {
        return view('backend.pasar_ciputat.export.formlaporanhargatanggalciputat', ['title' => 'LAPORAN HARGA HARIAN']);
    }

    public function index()
    {
        return view('backend.pasar_ciputat.export.index', ['title' => 'LAPORAN HARGA KOMODITAS PASAR CIPUTAT']);
    }
}
