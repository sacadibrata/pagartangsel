<?php

namespace App\Http\Controllers;

use App\Models\GabungData;
use App\Models\Komoditas;
use App\Models\KomoditasSemuaPasar;
use App\Models\Pasar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TabelPasarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexHargaPerKomoditas(Request $request)
    {
         $komoditasId = $request->input('komoditas_id');
        $NamaKomoditas = Komoditas::select('nama_komoditas', 'id','satuan_id')->find($komoditasId);
        $pasars = Pasar::all()->slice(1,7); // Ambil daftar pasar
        $komoditas = Komoditas::all();
         $pasarId = $request->input('pasar_id');
         $tanggal_input = $request->input('tanggal_input');
         $today = now();
         $InputToday = GabungData::where('tanggal_input', $today)->get();
         $filteredDataKomoditiAwal = Pasar::with(['gabungandata' => function ($query) use ($komoditasId, $today) {
                                    $query->where('komoditas_id', '1');
                                    }])->get()->slice(0,7);
        $datesAwal = $filteredDataKomoditiAwal ->flatMap(function ($data) {
                    return $data->gabungandata->pluck('tanggal_input');
                })->unique();
        // Mengurutkan tanggal dari yang terbaru ke yang terlama
        $datesAwal = $datesAwal->sortByDesc(function ($date) {
            return Carbon::parse($date);
        });

        // Mengambil 3 hari terakhir
        $lastThreeDay = $datesAwal->take(7);

        // Mengurutkan kembali tanggal dari yang terlama ke yang terbaru
        $lastThreeDay = $lastThreeDay->sortBy(function ($date) {
            return Carbon::parse($date);
        });

        $filterDataKomoditi = Pasar::with(['gabungandata' => function ($query) use ($komoditasId, $tanggal_input) {
                                            $query->where('komoditas_id', $komoditasId);
                                            }])->get()->slice(0,7);
        $dates = $filterDataKomoditi ->flatMap(function ($data) {
            return $data->gabungandata->pluck('tanggal_input');
        })->unique();

        // Mengurutkan tanggal dari yang terbaru ke yang terlama
        $dates = $dates->sortByDesc(function ($date) {
            return Carbon::parse($date);
        });

        // Mengambil 3 hari terakhir
        $lastThreeDays = $dates->take(7);

        // Mengurutkan kembali tanggal dari yang terlama ke yang terbaru
        $lastThreeDays = $lastThreeDays->sortBy(function ($date) {
            return Carbon::parse($date);
        });


        $filteredDataKomoditas = DB::table('gabung_data')
                                        ->join('komoditas', 'gabung_data.komoditas_id', 'komoditas.id')
                                        ->join('pasars', 'gabung_data.pasar_id', 'pasars.id')
                                        ->where('gabung_data.komoditas_id', $komoditasId)
                                        ->where('gabung_data.tanggal_input', $tanggal_input)
                                        ->orderBy('gabung_data.tanggal_input', 'asc')
                                        ->get();
        $filteredDataPasarSebagian = $filteredDataKomoditas->slice(0, 7);

        // Mengambil data dengan harga tertinggi
        $hargaTertinggi = $filteredDataPasarSebagian->max('average_harga');

        // Mengambil data dengan harga terendah
        $hargaTerendah = $filteredDataPasarSebagian->min('average_harga');

        // Mengambil detail pasar dengan harga tertinggi
        $pasarDenganHargaTertinggi = $filteredDataPasarSebagian->where('average_harga', $hargaTertinggi)->first();

        // Mengambil detail pasar dengan harga terendah
        $pasarDenganHargaTerendah = $filteredDataPasarSebagian->where('average_harga', $hargaTerendah)->first();

         //Batas
         if ($request->isMethod('post')) {
            $filterDataKomoditi = Pasar::with(['gabungandata' => function ($query) use ($komoditasId, $tanggal_input) {
                                    $query->where('komoditas_id', $komoditasId);
                                    }])->get()->slice(0,7);
            $dates = $filterDataKomoditi ->flatMap(function ($data) {
                return $data->gabungandata->pluck('tanggal_input');
            })->unique();

            // Mengurutkan tanggal dari yang terbaru ke yang terlama
            $dates = $dates->sortByDesc(function ($date) {
                return Carbon::parse($date);
            });

            // Mengambil 3 hari terakhir
            $lastThreeDays = $dates->take(7);

            // Mengurutkan kembali tanggal dari yang terlama ke yang terbaru
            $lastThreeDays = $lastThreeDays->sortBy(function ($date) {
                return Carbon::parse($date);
            });

            $filteredDataKomoditas = DB::table('gabung_data')
                                    ->join('komoditas', 'gabung_data.komoditas_id', 'komoditas.id')
                                    ->join('pasars', 'gabung_data.pasar_id', 'pasars.id')
                                    ->where('gabung_data.komoditas_id', $komoditasId)
                                    ->orderBy('gabung_data.tanggal_input', 'asc')
                                    ->get();
            $filteredDataPasarSebagian = $filteredDataKomoditas->slice(0, 7);

            // Mengambil data dengan harga tertinggi
            $hargaTertinggi = $filteredDataPasarSebagian->max('average_harga');

            // Mengambil data dengan harga terendah
            $hargaTerendah = $filteredDataPasarSebagian->min('average_harga');

            // Mengambil detail pasar dengan harga tertinggi
            $pasarDenganHargaTertinggi = $filteredDataPasarSebagian->where('average_harga', $hargaTertinggi)->first();

            // Mengambil detail pasar dengan harga terendah
            $pasarDenganHargaTerendah = $filteredDataPasarSebagian->where('average_harga', $hargaTerendah)->first();
         }
        return view('frontend.tabel.indexperkomoditas', compact('NamaKomoditas','komoditasId','pasarId','tanggal_input',
        'today','InputToday','filteredDataKomoditiAwal','pasars','komoditas',
        'filteredDataKomoditas','filteredDataPasarSebagian','hargaTertinggi','hargaTerendah',
        'pasarDenganHargaTertinggi','pasarDenganHargaTerendah','dates','datesAwal','filterDataKomoditi',
        'lastThreeDays','lastThreeDay'
        ),

        ['title' => 'Tabel Harga']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function indexHargaPerPasar(Request $request)
    {
         $pasarId = $request->input('pasar_id');
        $NamaPasar = Pasar::select('nama_pasar', 'id')->find($pasarId);
        $pasars = Pasar::all()->slice(0,7); // Ambil daftar pasar
        $komoditas = Komoditas::all();
        $pasarId = $request->input('pasar_id');
        $tanggal_input = $request->input('tanggal_input');
        $today = now();
        $InputToday = GabungData::where('tanggal_input', $today)->get();
        $filterDataPasar = Komoditas::with(['gabungandata' => function ($query) use ($pasarId) {
                            $query->where('pasar_id', $pasarId);
                            }])->get();
        $filterDataPasarAwal = Komoditas::with(['gabungandata' => function ($query) use ($pasarId) {
                                $query->where('pasar_id', '1');
                                }])->get();

        //Batas
        if ($request->isMethod('post')) {
            $filterDataPasar = Komoditas::with(['gabungandata' => function ($query) use ($pasarId) {
                                $query->where('pasar_id', $pasarId);
                                }])->get();

            $filterDataPasarAwal = Komoditas::with(['gabungandata' => function ($query) use ($pasarId) {
                                    $query->where('pasar_id', '1');
                                    }])->get();

           $filteredDataPasar = DB::table('gabung_data')
                                   ->join('komoditas', 'gabung_data.komoditas_id', 'komoditas.id')
                                   ->join('pasars', 'gabung_data.pasar_id', 'pasars.id')
                                   ->where('gabung_data.pasar_id', $pasarId)
                                   ->orderBy('gabung_data.tanggal_input', 'asc')
                                   ->get();
        }
       return view('frontend.tabel.indexperpasar', compact('pasarId','tanggal_input',
       'today','InputToday','pasars','komoditas','NamaPasar','pasarId','filterDataPasar',
       'filterDataPasarAwal'
       ),

       ['title' => 'Tabel Harga']);
    }

    public function indexHarga6Pasar(Request $request)
    {
        $komoditas = KomoditasSemuaPasar::with('pendataansemuapasar','pendataanceger',
        'pendataanciputat','pendataanjombang','pendataanserpong','pendataanjengkol',
        'pendataancimanggis')->get();

       return view('frontend.tabel.index6pasar', compact('komoditas'), ['title' => 'Tabel Harga']);
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
