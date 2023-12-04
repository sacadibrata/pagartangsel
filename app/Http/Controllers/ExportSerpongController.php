<?php

namespace App\Http\Controllers;

use App\Exports\CustomPendataansByBetweenDateExport;
use App\Exports\CustomPendataansByBetweenDateExportCiputat;
use App\Exports\CustomPendataansByDateExport;
use App\Exports\CustomPendataansByTodayYesterday;
use App\Exports\CustomPendataansByTodayYesterdayCiputat;
use App\Exports\CustomPendataansExport;
use App\Exports\LaporanHargaHarianCiputat;
use App\Exports\LaporanHargaHarianSerpong;
use App\Exports\LaporanHargaPilihTanggalCiputat;
use App\Exports\LaporanHargaPilihTanggalSerpong;
use App\Exports\LaporanMonitoringPengawasanInflasiSerpong;
use App\Exports\LaporanPerubahanHargaSerpong;
use App\Exports\PendataansExport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class ExportSerpongController extends Controller
{
    public function exportLaporanHargaPilihTanggalSerpong(Request $request)
    {
       // Get the selected start and end dates from the form input
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        return Excel::download(new LaporanHargaPilihTanggalSerpong($startDate,$endDate), 'Laporan Harga Harian Pasar Serpong.xlsx');
    }

    public function exportLaporanPerubahanHargaSerpong()
    {
       // Get the selected start and end dates from the form input
        return Excel::download(new LaporanPerubahanHargaSerpong, 'Laporan Perubahan Harga Pasar Serpong.xlsx');
    }

    public function exportLaporanMonitoringPengawasanInflasiSerpong()
    {
       // Get the selected start and end dates from the form input
        return Excel::download(new LaporanMonitoringPengawasanInflasiSerpong, 'Laporan Monitoring Pengawasan Inflasi Pasar Serpong.xlsx');
    }

    public function exportLaporanHargaHarianSerpong()
    {
       // Get the selected start and end dates from the form input
        return Excel::download(new LaporanHargaHarianSerpong, 'Laporan Harga Harian Pasar Serpong.xlsx');
    }

    public function exportFormLaporanPilihTanggalSerpong()
    {
        return view('backend.pasar_serpong.export.formlaporanhargatanggalserpong', ['title' => 'LAPORAN HARGA HARIAN']);
    }

    public function index()
    {
        return view('backend.pasar_serpong.export.index', ['title' => 'LAPORAN HARGA KOMODITAS PASAR SERPONG']);
    }

}
