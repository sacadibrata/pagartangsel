<?php

namespace App\Http\Controllers;

use App\Models\DataSurveyor;
use App\Models\KomoditasCimanggis;
use App\Models\KomoditasCiputat;
use App\Models\KomoditasJengkol;
use App\Models\PendataanPsCimanggis;
use App\Models\PendataanPsJengkol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendataanPsCimanggisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil informasi pengguna yang saat ini login
        $user = auth()->user();
        $pasar = DataSurveyor::where('user_id',$user->id)->first();
        $komoditas = KomoditasCimanggis::with('pendataancimanggis')->get();
        return view('backend.pasar_cimanggis.pendataanPsCimanggis.index', compact('user', 'komoditas','pasar'))->with(['title' => 'INPUT HARGA']);
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
        $pendataan = new PendataanPsCimanggis();
        $pendataan->create($request->all());
        return redirect()->route('pendataanPsCimanggis.index')->with('success', 'Harga Hari ini berhasil Diinput');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pendataan = DB::table('pendataan_ps_cimanggis')
                    ->join('komoditas', 'pendataan_ps_cimanggis.komoditas_id','komoditas.id')
                    ->where('pendataan_ps_cimanggis.komoditas_id', $id)
                    ->select('pendataan_ps_cimanggis.id as id_pendataan','komoditas.id as id_komoditas','pendataan_ps_cimanggis.tanggal_input','komoditas.nama_komoditas as nama_komoditas','pendataan_ps_cimanggis.harga_pedagang_1','pendataan_ps_cimanggis.harga_pedagang_2','pendataan_ps_cimanggis.harga_pedagang_3','pendataan_ps_cimanggis.average_harga')
                    ->orderBy('pendataan_ps_cimanggis.tanggal_input', 'asc')
                    ->get();

        return view('backend.pasar_cimanggis.pendataanPsCimanggis.show', compact('pendataan'), ['title' => 'DETAIL KOMODITAS']);
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
        PendataanPsCimanggis::findOrFail($id)->delete();

        return redirect()->route('pendataanPsCimanggis.index')->with('success', 'Data berhasil dihapus.');
    }
}
