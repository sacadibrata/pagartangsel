<?php

namespace App\Http\Controllers;

use App\Models\GabunganData;
use App\Models\GabungData;
use App\Models\Kategori;
use App\Models\Komoditas;
use App\Models\KomoditasSemuaPasar;
use App\Models\Pasar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function indexFrontend(Request $request)
     {
         $kategori = Kategori::all();
         $pasars = Pasar::all()->slice(1,7); // Ambil daftar pasar
         $komoditas = Komoditas::all();
         $totalPasar = Pasar::count();

         $profils = Pasar::with('profilPasar')->get()->slice(1,7);
         $distributors = Kategori::with('distributor')->get();
         $komoditasId = $request->input('komoditas_id');
         $pasarId = $request->input('pasar_id');
         $tanggal_input = $request->input('tanggal_input');
         $today = \Carbon\Carbon::today()->format('Y-m-d');
         $yesterday = now()->subDay()->format('Y-m-d');
         $hasInputToday = GabungData::where('tanggal_input', $today)->count() > 0;
         $InputYesterday = GabungData::where('tanggal_input', $yesterday)->where('komoditas_id','1')->get();
         $InputToday = GabungData::where('tanggal_input', $today)->get();


         // Ambil nama komoditas yang sesuai dengan komoditas_id
        $NamaKomoditas = Komoditas::select('nama_komoditas', 'id','satuan_id')->find($komoditasId);
        $NamaPasar = Pasar::select('nama_pasar', 'id')->find($pasarId);

        $tanggalInputPasar = \Carbon\Carbon::today()->format('Y-m-d');


        $filteredDataKomoditi = Pasar::with(['gabungandata' => function ($query) use ($komoditasId, $tanggal_input) {
                                $query->where('komoditas_id', $komoditasId)->where('tanggal_input', $tanggal_input);
                                }])->get()->slice(0,6);

        $filteredDataKomoditiAwal = Pasar::with(['gabungandata' => function ($query) use ($komoditasId, $today) {
                                    $query->where('komoditas_id', '1');
                                }])->get()->slice(0,7);


        $grafikDataKomoditi = DB::table('gabung_data')
                            ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                            ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                            ->where('gabung_data.komoditas_id', $komoditasId)
                            ->where('gabung_data.tanggal_input', $tanggal_input)
                            ->select('gabung_data.id as id_data','komoditas.id as id_komoditas','gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                    'gabung_data.average_harga','pasars.nama_pasar as nama_pasar')
                            ->orderBy('gabung_data.tanggal_input', 'asc')
                            ->get();


        $filteredDataKomoditas = DB::table('gabung_data')
                                ->join('komoditas', 'gabung_data.komoditas_id', 'komoditas.id')
                                ->join('pasars', 'gabung_data.pasar_id', 'pasars.id')
                                ->where('gabung_data.komoditas_id', $komoditasId)
                                ->where('gabung_data.tanggal_input', $tanggal_input)
                                ->orderBy('gabung_data.tanggal_input', 'asc')
                                ->get();
        $filteredDataPasarSebagian = $filteredDataKomoditas->slice(0, 7);

        $filteredDataKomoditas1 = DB::table('gabung_data')
                                ->join('komoditas', 'gabung_data.komoditas_id', 'komoditas.id')
                                ->join('pasars', 'gabung_data.pasar_id', 'pasars.id')
                                ->where('gabung_data.komoditas_id', '1')
                                ->where('gabung_data.tanggal_input', \Carbon\Carbon::yesterday()->format('Y-m-d'))
                                ->orderBy('gabung_data.tanggal_input', 'asc')
                                ->get();
        $filteredDataPasarSebagian1 = $filteredDataKomoditas1->slice(0, 7);

        $filteredDataKomoditas2 = DB::table('gabung_data')
                                ->join('komoditas', 'gabung_data.komoditas_id', 'komoditas.id')
                                ->join('pasars', 'gabung_data.pasar_id', 'pasars.id')
                                ->where('gabung_data.komoditas_id', '1')
                                ->where('gabung_data.tanggal_input', \Carbon\Carbon::today()->format('Y-m-d'))
                                ->orderBy('gabung_data.tanggal_input', 'asc')
                                ->get();
        $filteredDataPasarSebagian2 = $filteredDataKomoditas2->slice(0, 7);

        $filteredDataKomoditasAwal = DB::table('gabung_data')
                                ->join('komoditas', 'gabung_data.komoditas_id', 'komoditas.id')
                                ->join('pasars', 'gabung_data.pasar_id', 'pasars.id')
                                ->where('gabung_data.komoditas_id', '1')
                                ->where('gabung_data.tanggal_input', \Carbon\Carbon::yesterday()->format('Y-m-d'))
                                ->orderBy('gabung_data.tanggal_input', 'asc')
                                ->get();
        $filteredDataPasarSebagianAwal = $filteredDataKomoditasAwal->slice(0, 5);

        // Mengambil data dengan harga tertinggi
        $hargaTertinggi = $filteredDataKomoditas->max('average_harga');

        // Mengambil data dengan harga terendah
        $hargaTerendah = $filteredDataKomoditas->min('average_harga');

        // Mengambil detail pasar dengan harga tertinggi
        $pasarDenganHargaTertinggi = $filteredDataKomoditas->where('average_harga', $hargaTertinggi)->first();

        // Mengambil detail pasar dengan harga terendah
        $pasarDenganHargaTerendah = $filteredDataKomoditas->where('average_harga', $hargaTerendah)->first();

        $TabelDataPasar = Komoditas::with(['gabungandata' => function ($query) use ($pasarId, $tanggalInputPasar) {
                                        $query->where('pasar_id', '1')->where('tanggal_input', \Carbon\Carbon::today()->format('Y-m-d'));
                                        }])->get();

        $filterDataAwalPasar = Komoditas::with(['gabungandata' => function ($query) use ($pasarId) {
                                $query->where('pasar_id', '1');
                                }])->get();

        $filterDataPasar = Komoditas::with(['gabungandata' => function ($query) use ($pasarId) {
                                        $query->where('pasar_id', $pasarId);
                                        }])->get();

        $filteredDataKomoditasToday = Pasar::with(['gabungandata' => function ($query) use ($komoditasId, $tanggal_input) {
                                        $query->where('komoditas_id', '1');
                                        }])->get()->slice(0,7);


        $filteredDataKomoditasYesterday = Pasar::with(['gabungandata' => function ($query) use ($komoditasId, $tanggal_input) {
                                            $query->where('komoditas_id', '1');
                                            }])->get()->slice(0,7);



        $grafikBeras1 = DB::table('gabung_data')
                        ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                        ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                        ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                        ->where('gabung_data.pasar_id', '1')
                        ->where('gabung_data.komoditas_id', '1')
                        ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori','gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                'gabung_data.average_harga')
                        ->orderBy('gabung_data.tanggal_input', 'asc')
                        ->get();

        $grafikBeras2 = DB::table('gabung_data')
                        ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                        ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                        ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                        ->where('gabung_data.pasar_id', '1')
                        ->where('gabung_data.komoditas_id', '2')
                        ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori','gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                'gabung_data.average_harga')
                        ->orderBy('gabung_data.tanggal_input', 'asc')
                        ->get();

        $grafikBeras3 = DB::table('gabung_data')
                        ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                        ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                        ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                        ->where('gabung_data.pasar_id', '1')
                        ->where('gabung_data.komoditas_id', '3')
                        ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori','gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                'gabung_data.average_harga')
                        ->orderBy('gabung_data.tanggal_input', 'asc')
                        ->get();

        $grafikGula = DB::table('gabung_data')
                        ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                        ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                        ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                        ->where('gabung_data.pasar_id', '1')
                        ->where('gabung_data.komoditas_id', '4')
                        ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori','gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                'gabung_data.average_harga')
                        ->orderBy('gabung_data.tanggal_input', 'asc')
                        ->get();

        $grafikTelur = DB::table('gabung_data')
                        ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                        ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                        ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                        ->where('gabung_data.pasar_id', '1')
                        ->where('gabung_data.komoditas_id', '10')
                        ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori','gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                'gabung_data.average_harga')
                        ->orderBy('gabung_data.tanggal_input', 'asc')
                        ->get();

        $grafikCabai = DB::table('gabung_data')
                        ->join('komoditas', 'gabung_data.komoditas_id','komoditas.id')
                        ->join('kategoris', 'komoditas.kategori_id','kategoris.id')
                        ->join('pasars', 'gabung_data.pasar_id','pasars.id')
                        ->where('gabung_data.pasar_id', '1')
                        ->where('gabung_data.komoditas_id', '22')
                        ->select('komoditas.id as id_komoditas','kategoris.nama_kategori as nama_kategori','gabung_data.tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                'gabung_data.average_harga')
                        ->orderBy('gabung_data.tanggal_input', 'asc')
                        ->get();

        $filteredDataKomoditasAwal = DB::table('gabung_data')
                                    ->join('komoditas', 'gabung_data.komoditas_id', 'komoditas.id')
                                    ->join('pasars', 'gabung_data.pasar_id', 'pasars.id')
                                    ->join('satuans', 'komoditas.satuan_id', 'satuans.id')
                                    ->join('kategoris', 'komoditas.kategori_id', 'kategoris.id')
                                    ->where('gabung_data.pasar_id', '1')
                                    ->select('gabung_data.id as id','satuans.nama_satuan as nama_satuan','komoditas.id as id_komoditas','gabung_data.tanggal_input as tanggal_input','komoditas.nama_komoditas as nama_komoditas',
                                        'gabung_data.average_harga as average_harga','pasars.nama_pasar as nama_pasar','komoditas.gambar as gambar','kategoris.nama_kategori as nama_kategori')
                                    ->orderBy('gabung_data.tanggal_input', 'asc')
                                    ->get();

         // Jika permintaan adalah POST (pengiriman formulir filter)
         if ($request->isMethod('post')) {
            $filteredDataKomoditi = Pasar::with(['gabungandata' => function ($query) use ($komoditasId, $tanggal_input) {
                                    $query->where('komoditas_id', $komoditasId)->where('tanggal_input', $tanggal_input);
                                    }])->get()->slice(0,7);

            $filteredDataKomoditiAwal = Pasar::with(['gabungandata' => function ($query) use ($komoditasId, $tanggal_input) {
                                        $query->where('komoditas_id', '1')->where('tanggal_input', \Carbon\Carbon::yesterday()->format('Y-m-d'));
                                        }])->get()->slice(0,7);

            $filteredDataKomoditas = DB::table('gabung_data')
                                    ->join('komoditas', 'gabung_data.komoditas_id', 'komoditas.id')
                                    ->join('pasars', 'gabung_data.pasar_id', 'pasars.id')
                                    ->where('gabung_data.komoditas_id', $komoditasId)
                                    ->where('gabung_data.tanggal_input', $tanggal_input)
                                    ->orderBy('gabung_data.tanggal_input', 'asc')
                                    ->get();
            $filteredDataPasarSebagian = $filteredDataKomoditas->slice(0, 7);

            $filterDataPasar = Komoditas::with(['gabungandata' => function ($query) use ($pasarId) {
                                        $query->where('pasar_id', $pasarId);
                                        }])->get();

            // Mengambil data dengan harga tertinggi
            $hargaTertinggi = $filteredDataPasarSebagian->max('average_harga');

            // Mengambil data dengan harga terendah
            $hargaTerendah = $filteredDataPasarSebagian->min('average_harga');

            // Mengambil detail pasar dengan harga tertinggi
            $pasarDenganHargaTertinggi = $filteredDataPasarSebagian->where('average_harga', $hargaTertinggi)->first();

            // Mengambil detail pasar dengan harga terendah
            $pasarDenganHargaTerendah = $filteredDataPasarSebagian->where('average_harga', $hargaTerendah)->first();
         }

         // Jika permintaan adalah GET (pengambilan formulir filter)
         return view('frontend.home.index', compact('pasars','kategori','totalPasar', 'hargaTertinggi',
         'hargaTerendah', 'komoditas', 'NamaPasar', 'NamaKomoditas', 'tanggal_input',
          'filteredDataKomoditas', 'pasarDenganHargaTertinggi', 'pasarDenganHargaTerendah',
          'filteredDataKomoditi','grafikDataKomoditi','filterDataAwalPasar','filterDataPasar',
          'filteredDataKomoditiAwal','filteredDataKomoditasAwal','filteredDataPasarSebagian',
          'filteredDataKomoditasAwal','filteredDataPasarSebagianAwal','grafikBeras1','grafikBeras2',
           'grafikBeras3', 'grafikGula','grafikCabai','grafikTelur','hasInputToday','today','InputToday','InputYesterday',
        'filteredDataKomoditasToday','filteredDataKomoditasYesterday','filteredDataKomoditas1',
            'filteredDataKomoditas2','filteredDataPasarSebagian1','filteredDataPasarSebagian2','profils',
        'distributors'),
          ['title' => 'Home']);
     }

    /**
     * Show the form for creating a new resource.
     */

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
