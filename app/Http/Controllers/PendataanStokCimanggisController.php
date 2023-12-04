<?php

namespace App\Http\Controllers;

use App\Models\DataSurveyor;
use App\Models\KomoditasCimanggis;
use App\Models\Pasar;
use App\Models\PendataanStokCimanggis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendataanStokCimanggisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexAdminCimanggis()
    {
         // Mengambil informasi pengguna yang saat ini login
         $users = auth()->user();
        $pasars = Pasar ::all()->where('id','3');
        $pasar = DataSurveyor::where('user_id',$users->id)->first();
         $komoditas = KomoditasCimanggis::with('stokcimanggis')->get();
         return view('backend.admin.pendataanstok.indexCimanggis', compact('users', 'komoditas','pasar','pasars'))
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
    public function storeAdminCimanggis(Request $request)
    {
        $pendataan = new PendataanStokCimanggis();
        $pendataan->create($request->all());
        return redirect()->route('pendataanStok.indexAdminCimanggis')->with('success', 'Harga Hari ini berhasil Diinput');
    }

    /**
     * Display the specified resource.
     */
    public function showAdminCimanggis(string $id)
    {
        $pendataan = DB::table('pendataan_stok_cimanggis')
                    ->join('komoditas', 'pendataan_stok_cimanggis.komoditas_id','komoditas.id')
                    ->join('satuans', 'komoditas.satuan_id','satuans.id')
                    ->where('pendataan_stok_cimanggis.komoditas_id', $id)
                    ->select('pendataan_stok_cimanggis.id as id_pendataan',
                    'komoditas.id as id_komoditas','pendataan_stok_cimanggis.tanggal_input',
                    'komoditas.nama_komoditas as nama_komoditas',
                    'pendataan_stok_cimanggis.stok_pedagang_1',
                    'pendataan_stok_cimanggis.stok_pedagang_2',
                    'pendataan_stok_cimanggis.stok_pedagang_3',
                    'pendataan_stok_cimanggis.average_stok','satuans.nama_satuan')
                    ->orderBy('pendataan_stok_cimanggis.tanggal_input', 'asc')
                    ->get();

        $users = auth()->user();

        return view('backend.admin.pendataanstok.showCimanggis', compact('pendataan','users'), ['title' => 'DETAIL KOMODITAS']);
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
    public function destroyAdminCimanggis(string $id)
    {
        PendataanStokCimanggis::findOrFail($id)->delete();

        return redirect()->route('pendataanStok.indexAdminCimanggis')->with('success', 'Data berhasil dihapus.');
    }
}
