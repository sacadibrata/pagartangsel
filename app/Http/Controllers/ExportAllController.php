<?php

namespace App\Http\Controllers;

use App\Exports\LaporanHargaHarianAll;
use App\Exports\LaporanHargaPilihTanggalAll;
use App\Exports\LaporanPerubahanHargaAll;
use App\Models\GabunganData;
use App\Models\Komoditas;
use App\Models\Pasar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class ExportAllController extends Controller
{

    public function exportFormPilihTanggal()
    {
        return view('backend.admin.export.formlaporanhargatanggalall', ['title' => 'LAPORAN HARGA HARIAN']);
    }

    public function exportLaporanHargaPilihTanggal(Request $request)
    {
       // Get the selected start and end dates from the form input
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        return Excel::download(new LaporanHargaPilihTanggalAll($startDate,$endDate), 'Laporan Harga Harian Semua Pasar.xlsx');
    }

    public function exportLaporanPerubahanHargaAll()
    {
       // Get the selected start and end dates from the form input
        return Excel::download(new LaporanPerubahanHargaAll, 'Laporan Perubahan Harga Semua Pasar.xlsx');
    }

    public function exportLaporanHargaHarianAll()
    {
       // Get the selected start and end dates from the form input
        return Excel::download(new LaporanHargaHarianAll, 'Laporan Harga Harian Semua Pasar.xlsx');
    }

    public function index()
    {
        return view('backend.admin.export.index', ['title' => 'LAPORAN HARGA KOMODITAS SELURUH PASAR']);
    }

    public function filterByPasar(Request $request)
    {
        $pasars = Pasar::all(); // Ambil daftar pasar
        $komoditas = Komoditas::all();

        $komoditasId = $request->input('komoditas_id');
        $tanggal_input = $request->input('tanggal_input');

        // Jika permintaan adalah POST (pengiriman formulir filter)
        if ($request->isMethod('post')) {

            // Lakukan filter data berdasarkan pasar_id
            $filteredData = DB::table('gabungan_data')
                            ->join('komoditas', 'gabungan_data.komoditas_id','komoditas.id')
                            ->join('pasars', 'gabungan_data.pasar_id','pasars.id')
                            ->where('komoditas_id',$komoditasId)
                            ->where('tanggal_input',$tanggal_input)
                            ->orderBy('gabungan_data.tanggal_input', 'asc')
                            ->get();

            // Misalnya, Anda dapat menggunakan Eloquent untuk mengambil data yang sesuai

            // Kemudian tampilkan hasil filter di halaman yang sama
            return view('backend.admin.export.filtered_data', compact('filteredData','pasars','komoditas'), ['title' => 'FILTER PASAR']);
        }

        // Jika permintaan adalah GET (pengambilan formulir filter)
        return view('backend.admin.export.filtered_data', compact('pasars'), ['title' => 'FILTER PASAR']);
    }

}
