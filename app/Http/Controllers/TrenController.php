<?php

namespace App\Http\Controllers;

use App\Models\GabungData;
use App\Models\Komoditas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexHarian(Request $request)
    {
        $komoditasId = $request->input('komoditas_id');
        $bulanId = $request->input('bulan_id');
        $komoditas = Komoditas::all();
        $NamaKomoditas = Komoditas::select('nama_komoditas', 'id','satuan_id')->find($komoditasId);
        $tanggal_input = $request->input('tanggal_input');
        $today = \Carbon\Carbon::today()->format('Y-m-d');
        $InputToday = GabungData::where('tanggal_input', $today)->get();
        $grafikPasardanKomoditi1 = DB::table('gabung_data')
                                ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                                ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                                ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                                ->where('gabung_data.pasar_id', '1')
                                ->where('gabung_data.komoditas_id', '1')
                                ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori',
                                        'gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                        'gabung_data.average_harga','pasars.nama_pasar as nama_pasar')
                                ->orderBy('gabung_data.tanggal_input', 'asc')
                                ->get();

        $grafikPasardanKomoditi2 = DB::table('gabung_data')
                                ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                                ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                                ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                                ->where('gabung_data.pasar_id', '1')
                                ->where('gabung_data.komoditas_id', '2')
                                ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori',
                                        'gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                        'gabung_data.average_harga','pasars.nama_pasar as nama_pasar')
                                ->orderBy('gabung_data.tanggal_input', 'asc')
                                ->get();

        $grafikPasardanKomoditi3 = DB::table('gabung_data')
                                ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                                ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                                ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                                ->where('gabung_data.pasar_id', '1')
                                ->where('gabung_data.komoditas_id', '3')
                                ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori',
                                        'gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                        'gabung_data.average_harga','pasars.nama_pasar as nama_pasar')
                                ->orderBy('gabung_data.tanggal_input', 'asc')
                                ->get();

        $grafikPasardanKomoditi4 = DB::table('gabung_data')
                                ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                                ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                                ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                                ->where('gabung_data.pasar_id', '1')
                                ->where('gabung_data.komoditas_id', '4')
                                ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori',
                                        'gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                        'gabung_data.average_harga','pasars.nama_pasar as nama_pasar')
                                ->orderBy('gabung_data.tanggal_input', 'asc')
                                ->get();

        $grafikPasardanKomoditi7 = DB::table('gabung_data')
                                ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                                ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                                ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                                ->where('gabung_data.pasar_id', '1')
                                ->where('gabung_data.komoditas_id', '7')
                                ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori',
                                        'gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                        'gabung_data.average_harga','pasars.nama_pasar as nama_pasar')
                                ->orderBy('gabung_data.tanggal_input', 'asc')
                                ->get();

        $grafikPasardanKomoditi10 = DB::table('gabung_data')
                                ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                                ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                                ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                                ->where('gabung_data.pasar_id', '1')
                                ->where('gabung_data.komoditas_id', '10')
                                ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori',
                                        'gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                        'gabung_data.average_harga','pasars.nama_pasar as nama_pasar')
                                ->orderBy('gabung_data.tanggal_input', 'asc')
                                ->get();

        $grafikPasardanKomoditi22 = DB::table('gabung_data')
                                ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                                ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                                ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                                ->where('gabung_data.pasar_id', '1')
                                ->where('gabung_data.komoditas_id', '22')
                                ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori',
                                        'gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                        'gabung_data.average_harga','pasars.nama_pasar as nama_pasar')
                                ->orderBy('gabung_data.tanggal_input', 'asc')
                                ->get();

        $grafikPasardanKomoditi = DB::table('gabung_data')
                                ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                                ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                                ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                                ->where('gabung_data.pasar_id', '1')
                                ->where('gabung_data.komoditas_id', $komoditasId)
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
                                ->where('gabung_data.pasar_id', '1')
                                ->where('gabung_data.komoditas_id', $komoditasId)
                                ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori',
                                        'gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                        'gabung_data.average_harga','pasars.nama_pasar as nama_pasar')
                                ->orderBy('gabung_data.tanggal_input', 'asc')
                                ->get();
        }

        return view('frontend.tren.indexHarian', compact('komoditasId','komoditas','NamaKomoditas',
        'grafikPasardanKomoditi','tanggal_input','today','InputToday','grafikPasardanKomoditi',
        'grafikPasardanKomoditi1','grafikPasardanKomoditi2','grafikPasardanKomoditi3','bulanId',
        'grafikPasardanKomoditi4','grafikPasardanKomoditi7','grafikPasardanKomoditi10',
        'grafikPasardanKomoditi22'
       ),

       ['title' => 'Tren Harga Komoditas']);
    }

    public function indexBulan(Request $request)
    {
        $komoditasId = $request->input('komoditas_id');
        $bulanId = $request->input('bulan_id');
        $komoditas = Komoditas::all();
        $NamaKomoditas = Komoditas::select('nama_komoditas', 'id','satuan_id')->find($komoditasId);
        $tanggal_input = $request->input('tanggal_input');
        $today = \Carbon\Carbon::today()->format('Y-m-d');
        $InputToday = GabungData::where('tanggal_input', $today)->get();
        $grafikPasardanKomoditi1 = DB::table('gabung_data')
                                ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                                ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                                ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                                ->where('gabung_data.pasar_id', '1')
                                ->where('gabung_data.komoditas_id', '1')
                                ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori',
                                        'gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                        'gabung_data.average_harga','pasars.nama_pasar as nama_pasar')
                                ->orderBy('gabung_data.tanggal_input', 'asc')
                                ->get();

        $grafikPasardanKomoditi2 = DB::table('gabung_data')
                                ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                                ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                                ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                                ->where('gabung_data.pasar_id', '1')
                                ->where('gabung_data.komoditas_id', '2')
                                ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori',
                                        'gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                        'gabung_data.average_harga','pasars.nama_pasar as nama_pasar')
                                ->orderBy('gabung_data.tanggal_input', 'asc')
                                ->get();

        $grafikPasardanKomoditi3 = DB::table('gabung_data')
                                ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                                ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                                ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                                ->where('gabung_data.pasar_id', '1')
                                ->where('gabung_data.komoditas_id', '3')
                                ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori',
                                        'gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                        'gabung_data.average_harga','pasars.nama_pasar as nama_pasar')
                                ->orderBy('gabung_data.tanggal_input', 'asc')
                                ->get();

        $grafikPasardanKomoditi4 = DB::table('gabung_data')
                                ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                                ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                                ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                                ->where('gabung_data.pasar_id', '1')
                                ->where('gabung_data.komoditas_id', '4')
                                ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori',
                                        'gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                        'gabung_data.average_harga','pasars.nama_pasar as nama_pasar')
                                ->orderBy('gabung_data.tanggal_input', 'asc')
                                ->get();

        $grafikPasardanKomoditi7 = DB::table('gabung_data')
                                ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                                ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                                ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                                ->where('gabung_data.pasar_id', '1')
                                ->where('gabung_data.komoditas_id', '7')
                                ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori',
                                        'gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                        'gabung_data.average_harga','pasars.nama_pasar as nama_pasar')
                                ->orderBy('gabung_data.tanggal_input', 'asc')
                                ->get();

        $grafikPasardanKomoditi10 = DB::table('gabung_data')
                                ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                                ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                                ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                                ->where('gabung_data.pasar_id', '1')
                                ->where('gabung_data.komoditas_id', '10')
                                ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori',
                                        'gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                        'gabung_data.average_harga','pasars.nama_pasar as nama_pasar')
                                ->orderBy('gabung_data.tanggal_input', 'asc')
                                ->get();

        $grafikPasardanKomoditi22 = DB::table('gabung_data')
                                ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                                ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                                ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                                ->where('gabung_data.pasar_id', '1')
                                ->where('gabung_data.komoditas_id', '22')
                                ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori',
                                        'gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                        'gabung_data.average_harga','pasars.nama_pasar as nama_pasar')
                                ->orderBy('gabung_data.tanggal_input', 'asc')
                                ->get();

        $grafikPasardanKomoditi = DB::table('gabung_data')
                                ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                                ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                                ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                                ->where('gabung_data.pasar_id', '1')
                                ->where('gabung_data.komoditas_id', $komoditasId)
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
                                ->where('gabung_data.pasar_id', '1')
                                ->where('gabung_data.komoditas_id', $komoditasId)
                                ->whereMonth('gabung_data.tanggal_input', $bulanId)
                                ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori',
                                        'gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                        'gabung_data.average_harga','pasars.nama_pasar as nama_pasar')
                                ->orderBy('gabung_data.tanggal_input', 'asc')
                                ->get();
        }

        return view('frontend.tren.indexBulan', compact('komoditasId','komoditas','NamaKomoditas',
        'grafikPasardanKomoditi','tanggal_input','today','InputToday','grafikPasardanKomoditi',
        'grafikPasardanKomoditi1','grafikPasardanKomoditi2','grafikPasardanKomoditi3','bulanId',
        'grafikPasardanKomoditi4','grafikPasardanKomoditi7','grafikPasardanKomoditi10',
        'grafikPasardanKomoditi22'
       ),

       ['title' => 'Tren Harga Komoditas']);
    }

    /**
     * Show the form for creating a new resource.
     */
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
