<?php

namespace App\Http\Controllers;

use App\Models\GabungData;
use App\Models\Komoditas;
use App\Models\Pasar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Generator\StringManipulation\Pass\Pass;

class GrafikPasarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexGrafikPerKomoditas(Request $request)
    {
        $komoditasId = $request->input('komoditas_id');
        $NamaKomoditas = Komoditas::select('nama_komoditas', 'id','satuan_id')->find($komoditasId);
        $tanggal_input = $request->input('tanggal_input');
        $komoditas = Komoditas::all();
        $today = \Carbon\Carbon::today()->format('Y-m-d');
        $InputToday = GabungData::where('tanggal_input', $today)->get();
        $grafikKomoditi = DB::table('gabung_data')
                        ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                        ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                        ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                        ->where('gabung_data.tanggal_input', $tanggal_input)
                        ->where('gabung_data.komoditas_id', $komoditasId)
                        ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori','gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                'gabung_data.average_harga','pasars.nama_pasar as nama_pasar')
                        ->orderBy('gabung_data.tanggal_input', 'asc')
                        ->get();

        $grafikKomoditasToday = DB::table('gabung_data')
                        ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                        ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                        ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                        ->where('gabung_data.tanggal_input', \Carbon\Carbon::today()->format('Y-m-d'))
                        ->where('gabung_data.komoditas_id', '2')
                        ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori',
                                'gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                'gabung_data.average_harga','pasars.nama_pasar as nama_pasar')
                        ->orderBy('gabung_data.tanggal_input', 'asc')
                        ->get();

        $grafikKomoditasYesterday = DB::table('gabung_data')
                        ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                        ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                        ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                        ->where('gabung_data.tanggal_input', \Carbon\Carbon::yesterday()->format('Y-m-d'))
                        ->where('gabung_data.komoditas_id', '2')
                        ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori',
                                'gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                'gabung_data.average_harga','pasars.nama_pasar as nama_pasar')
                        ->orderBy('gabung_data.tanggal_input', 'asc')
                        ->get();


        if ($request->isMethod('post')) {
            $grafikKomoditi = DB::table('gabung_data')
                            ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                            ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                            ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                            ->where('gabung_data.komoditas_id', $komoditasId)
                            ->where('gabung_data.tanggal_input', $tanggal_input)
                            ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori','gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                    'gabung_data.average_harga','pasars.nama_pasar as nama_pasar')
                            ->orderBy('gabung_data.tanggal_input', 'asc')
                            ->get();
        }

        return view('frontend.grafik.indexperkomoditas', compact('komoditas','NamaKomoditas',
        'komoditasId', 'grafikKomoditi','grafikKomoditasToday','InputToday',
        'grafikKomoditasYesterday',
       ),

       ['title' => 'Grafik Harga']);
    }

    public function indexGrafikPerPasarDanKomoditas(Request $request)
    {
        $komoditasId = $request->input('komoditas_id');
        $NamaKomoditas = Komoditas::select('nama_komoditas', 'id','satuan_id')->find($komoditasId);
        $pasarId = $request->input('pasar_id');
        $NamaPasar = Pasar::select('nama_pasar', 'id')->find($pasarId);
        $tanggal_input = $request->input('tanggal_input');
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalAkhir = $request->input('tanggal_akhir');
        $komoditas = Komoditas::all();
        $pasars = Pasar::all();
        $today = \Carbon\Carbon::today()->format('Y-m-d');
        $InputToday = GabungData::where('tanggal_input', $today)->get();
        $grafikPasardanKomoditi = DB::table('gabung_data')
                                ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                                ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                                ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                                ->where('gabung_data.komoditas_id', '2')
                                ->where('gabung_data.pasar_id', '1')
                                ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori',
                                        'gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                        'gabung_data.average_harga','pasars.nama_pasar as nama_pasar')
                                ->orderBy('gabung_data.tanggal_input', 'asc')
                                ->get();


        $grafikPasarToday = DB::table('gabung_data')
                        ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                        ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                        ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                        ->where('gabung_data.tanggal_input', \Carbon\Carbon::today()->format('Y-m-d'))
                        ->where('gabung_data.pasar_id', '1')
                        ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori',
                                'gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                'gabung_data.average_harga','pasars.nama_pasar as nama_pasar')
                        ->orderBy('gabung_data.tanggal_input', 'asc')
                        ->get();

        $grafikPasarYesterday = DB::table('gabung_data')
                        ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                        ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                        ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                        ->where('gabung_data.tanggal_input', \Carbon\Carbon::yesterday()->format('Y-m-d'))
                        ->where('gabung_data.pasar_id', '2')
                        ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori',
                                'gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                'gabung_data.average_harga','pasars.nama_pasar as nama_pasar')
                        ->orderBy('gabung_data.tanggal_input', 'asc')
                        ->get();


        if ($request->isMethod('post')) {
            $grafikPasardanKomoditi = DB::table('gabung_data')
                                ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                                ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                                ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                                ->where('gabung_data.komoditas_id', $komoditasId)
                                ->where('gabung_data.pasar_id', $pasarId)
                                ->whereBetween('gabung_data.tanggal_input', [$tanggalMulai, $tanggalAkhir])
                                ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori',
                                        'gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                        'gabung_data.average_harga','pasars.nama_pasar as nama_pasar')
                                ->orderBy('gabung_data.tanggal_input', 'asc')
                                ->get();
        }

        return view('frontend.grafik.indexperpasar', compact('komoditasId','komoditas','NamaKomoditas',
        'pasars','NamaPasar','pasarId','grafikPasardanKomoditi','tanggal_input','today','InputToday',
        'grafikPasardanKomoditi',
       ),

       ['title' => 'Grafik Harga']);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
