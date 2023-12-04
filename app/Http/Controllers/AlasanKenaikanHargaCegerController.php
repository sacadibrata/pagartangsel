<?php

namespace App\Http\Controllers;

use App\Models\AlasanKenaikanHargaCeger;
use App\Models\AlasanKenaikanHargaJombang;
use App\Models\DataSurveyor;
use App\Models\KomoditasCeger;
use App\Models\KomoditasJombang;
use App\Models\ReasonJombang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlasanKenaikanHargaCegerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $pasar = DataSurveyor::where('user_id',$user->id)->first();
        $komoditas = KomoditasCeger::with('pendataanceger','reasonCeger','alasannaikhargaceger')->get();
        $komoditass = KomoditasCeger::with('reasonCeger')->get();
        $alasan = DB::table('alasan_kenaikan_harga_cegers')
                ->join('komoditas', 'alasan_kenaikan_harga_cegers.komoditas_id','komoditas.id')
                ->join('reason_cegers', 'alasan_kenaikan_harga_cegers.reason_id','reason_cegers.id')
                ->select('alasan_kenaikan_harga_cegers.komoditas_id','komoditas.id as id_komoditas','reason_cegers.id as id_reason','alasan_kenaikan_harga_cegers.tanggal_input as tanggal_input','reason_cegers.nama_alasan as nama_alasan')
                ->orderBy('alasan_kenaikan_harga_cegers.tanggal_input', 'asc')
                ->get();
        return view('backend.pasar_ceger.alasanKenaikanCeger.index', compact('komoditas','alasan','komoditass','pasar'), ['title' => 'PENYEBAB KENAIKAN HARGA KOMODITAS']);
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
        $alasan = new AlasanKenaikanHargaCeger();
        $alasan->create($request->all());
        return redirect()->route('alasanCeger.index')->with('success', 'Harga Hari ini berhasil Diinput');
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
