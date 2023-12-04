<?php

namespace App\Http\Controllers;

use App\Models\AlasanKenaikanHargaCimanggis;
use App\Models\DataSurveyor;
use App\Models\KomoditasCimanggis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlasanKenaikanHargaCimanggisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $pasar = DataSurveyor::where('user_id',$user->id)->first();
        $komoditas = KomoditasCimanggis::with('pendataancimanggis','reasonCimanggis','alasannaikhargacimanggis')->get();
        $komoditass = KomoditasCimanggis::with('reasonCimanggis')->get();
        $alasan = DB::table('alasan_kenaikan_harga_cimanggis')
                ->join('komoditas', 'alasan_kenaikan_harga_cimanggis.komoditas_id','komoditas.id')
                ->join('reason_cimanggis', 'alasan_kenaikan_harga_cimanggis.reason_id','reason_cimanggis.id')
                ->select('alasan_kenaikan_harga_cimanggis.komoditas_id','komoditas.id as id_komoditas','reason_cimanggis.id as id_reason','alasan_kenaikan_harga_cimanggis.tanggal_input as tanggal_input','reason_cimanggis.nama_alasan as nama_alasan')
                ->orderBy('alasan_kenaikan_harga_cimanggis.tanggal_input', 'asc')
                ->get();
        return view('backend.pasar_cimanggis.alasanKenaikanCimanggis.index', compact('komoditas','alasan','komoditass','pasar'), ['title' => 'PENYEBAB KENAIKAN HARGA KOMODITAS']);
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
        $alasan = new AlasanKenaikanHargaCimanggis();
        $alasan->create($request->all());
        return redirect()->route('alasanCimanggis.index')->with('success', 'Harga Hari ini berhasil Diinput');
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
