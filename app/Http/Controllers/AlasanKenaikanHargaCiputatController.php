<?php

namespace App\Http\Controllers;

use App\Models\AlasanKenaikanHargaCiputat;
use App\Models\DataSurveyor;
use App\Models\KomoditasCiputat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlasanKenaikanHargaCiputatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $pasar = DataSurveyor::where('user_id',$user->id)->first();
        $komoditas = KomoditasCiputat::with('pendataanciputat','reasonCiputat','alasannaikhargaciputat')->get();
        $komoditass = KomoditasCiputat::with('reasonCiputat')->get();
        $alasan = DB::table('alasan_kenaikan_harga_ciputats')
                ->join('komoditas', 'alasan_kenaikan_harga_ciputats.komoditas_id','komoditas.id')
                ->join('reason_ciputats', 'alasan_kenaikan_harga_ciputats.reason_id','reason_ciputats.id')
                ->select('alasan_kenaikan_harga_ciputats.komoditas_id','komoditas.id as id_komoditas','reason_ciputats.id as id_reason','alasan_kenaikan_harga_ciputats.tanggal_input as tanggal_input','reason_ciputats.nama_alasan as nama_alasan')
                ->orderBy('alasan_kenaikan_harga_ciputats.tanggal_input', 'asc')
                ->get();
        return view('backend.pasar_ciputat.alasanKenaikanCiputat.index', compact('komoditas','alasan','komoditass','pasar'), ['title' => 'PENYEBAB KENAIKAN HARGA KOMODITAS']);
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
        $alasan = new AlasanKenaikanHargaCiputat();
        $alasan->create($request->all());
        return redirect()->route('alasanCiputat.index')->with('success', 'Harga Hari ini berhasil Diinput');
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
