<?php

namespace App\Http\Controllers;

use App\Models\DataSurveyor;
use App\Models\Komoditas;
use App\Models\KomoditasCiputat;
use App\Models\KomoditasPsCiputat;
use App\Models\PendataanAll;
use App\Models\PendataanPsCiputat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendataanPsCiputatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil informasi pengguna yang saat ini login
        $user = auth()->user();
        $pasar = DataSurveyor::where('user_id',$user->id)->first();
        $komoditas = KomoditasCiputat::with('pendataanciputat')->get();
        return view('backend.pasar_ciputat.pendataanPsCiputat.index', compact('user', 'komoditas','pasar'))->with(['title' => 'INPUT HARGA']);
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
        $pendataan = new PendataanPsCiputat();
        $pendataan->create($request->all());
        return redirect()->route('pendataanPsCiputat.index')->with('success', 'Harga Hari ini berhasil Diinput');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pendataan = DB::table('pendataan_ps_ciputats')
                    ->join('komoditas', 'pendataan_ps_ciputats.komoditas_id','komoditas.id')
                    ->where('pendataan_ps_ciputats.komoditas_id', $id)
                    ->select('pendataan_ps_ciputats.id as id_pendataan','komoditas.id as id_komoditas','pendataan_ps_ciputats.tanggal_input','komoditas.nama_komoditas as nama_komoditas','pendataan_ps_ciputats.harga_pedagang_1','pendataan_ps_ciputats.harga_pedagang_2','pendataan_ps_ciputats.harga_pedagang_3','pendataan_ps_ciputats.average_harga')
                    ->orderBy('pendataan_ps_ciputats.tanggal_input', 'asc')
                    ->get();

        return view('backend.pasar_ciputat.pendataanPsCiputat.show', compact('pendataan'), ['title' => 'DETAIL KOMODITAS']);
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
        PendataanPsCiputat::findOrFail($id)->delete();

        return redirect()->route('pendataanPsCiputat.index')->with('success', 'Data berhasil dihapus.');
    }
}
