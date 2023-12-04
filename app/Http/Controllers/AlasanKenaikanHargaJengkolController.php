<?php

namespace App\Http\Controllers;

use App\Models\AlasanKenaikanHargaJengkol;
use App\Models\AlasanKenaikanHargaJombang;
use App\Models\DataSurveyor;
use App\Models\KomoditasJengkol;
use App\Models\KomoditasJombang;
use App\Models\ReasonJombang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlasanKenaikanHargaJengkolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $pasar = DataSurveyor::where('user_id',$user->id)->first();
        $komoditas = KomoditasJengkol::with('pendataanjengkol','reasonJengkol','alasannaikhargajengkol')->get();
        $komoditass = KomoditasJengkol::with('reasonJengkol')->get();
        $alasan = DB::table('alasan_kenaikan_harga_jengkols')
                ->join('komoditas', 'alasan_kenaikan_harga_jengkols.komoditas_id','komoditas.id')
                ->join('reason_jengkols', 'alasan_kenaikan_harga_jengkols.reason_id','reason_jengkols.id')
                ->select('alasan_kenaikan_harga_jengkols.komoditas_id','komoditas.id as id_komoditas','reason_jengkols.id as id_reason','alasan_kenaikan_harga_jengkols.tanggal_input as tanggal_input','reason_jengkols.nama_alasan as nama_alasan')
                ->orderBy('alasan_kenaikan_harga_jengkols.tanggal_input', 'asc')
                ->get();
        return view('backend.pasar_jengkol.alasanKenaikanJengkol.index', compact('komoditas','alasan','komoditass','pasar'), ['title' => 'PENYEBAB KENAIKAN HARGA KOMODITAS']);
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
        $alasan = new AlasanKenaikanHargaJengkol();
        $alasan->create($request->all());
        return redirect()->route('alasanJengkol.index')->with('success', 'Harga Hari ini berhasil Diinput');
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
