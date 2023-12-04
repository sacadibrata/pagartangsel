<?php

namespace App\Http\Controllers;

use App\Models\DataSurveyor;
use App\Models\KomoditasSerpong;
use App\Models\Pasar;
use App\Models\PendataanStokSerpong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendataanStokSerpongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexAdminSerpong()
    {
         // Mengambil informasi pengguna yang saat ini login
         $users = auth()->user();
        $pasars = Pasar ::all()->where('id','7');
        $pasar = DataSurveyor::where('user_id',$users->id)->first();
         $komoditas = KomoditasSerpong::with('stokserpong')->get();
         return view('backend.admin.pendataanstok.indexSerpong', compact('users', 'komoditas','pasar','pasars'))
         ->with(['title' => 'List Stock Product']);
    }

    public function getSurveyorSemuaPasar($id)
    {
            $dataSurveyors = DB :: table('data_surveyors')
            ->join('users', 'data_surveyors.user_id','users.id')
            ->where('data_surveyors.pasar_id', $id)
            ->select('users.name as nama_user','data_surveyors.id as id_surveyor' )
            ->get();
        return response()->json($dataSurveyors);
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
    public function storeAdminSerpong(Request $request)
    {
        $pendataan = new PendataanStokSerpong();
        $pendataan->create($request->all());
        return redirect()->route('pendataanStok.indexAdminSerpong')->with('success', 'Harga Hari ini berhasil Diinput');
    }

    /**
     * Display the specified resource.
     */
    public function showAdminSerpong(string $id)
    {
        $pendataan = DB::table('pendataan_stok_serpongs')
                    ->join('komoditas', 'pendataan_stok_serpongs.komoditas_id','komoditas.id')
                    ->join('satuans', 'komoditas.satuan_id','satuans.id')
                    ->where('pendataan_stok_serpongs.komoditas_id', $id)
                    ->select('pendataan_stok_serpongs.id as id_pendataan',
                    'komoditas.id as id_komoditas','pendataan_stok_serpongs.tanggal_input',
                    'komoditas.nama_komoditas as nama_komoditas',
                    'pendataan_stok_serpongs.stok_pedagang_1',
                    'pendataan_stok_serpongs.stok_pedagang_2',
                    'pendataan_stok_serpongs.stok_pedagang_3',
                    'pendataan_stok_serpongs.average_stok','satuans.nama_satuan')
                    ->orderBy('pendataan_stok_serpongs.tanggal_input', 'asc')
                    ->get();

        $users = auth()->user();

        return view('backend.admin.pendataanstok.showSerpong', compact('pendataan','users'), ['title' => 'DETAIL KOMODITAS']);
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
    public function destroyAdminSerpong(string $id)
    {
        PendataanStokSerpong::findOrFail($id)->delete();

        return redirect()->route('pendataanStok.indexAdminSerpong')->with('success', 'Data berhasil dihapus.');
    }
}
