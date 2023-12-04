<?php

namespace App\Http\Controllers;

use App\Models\AlasanKenaikanHargaSerpong;
use App\Models\DataSurveyor;
use App\Models\KomoditasSerpong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlasanKenaikanHargaSerpongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $pasar = DataSurveyor::where('user_id',$user->id)->first();
        $komoditas = KomoditasSerpong::with('pendataanserpong','reasonSerpong','alasannaikhargaserpong')->get();
        $komoditass = KomoditasSerpong::with('reasonSerpong')->get();
        $alasan = DB::table('alasan_kenaikan_harga_serpongs')
                ->join('komoditas', 'alasan_kenaikan_harga_serpongs.komoditas_id','komoditas.id')
                ->join('reason_serpongs', 'alasan_kenaikan_harga_serpongs.reason_id','reason_serpongs.id')
                ->select('alasan_kenaikan_harga_serpongs.komoditas_id','komoditas.id as id_komoditas','reason_serpongs.id as id_reason','alasan_kenaikan_harga_serpongs.tanggal_input as tanggal_input','reason_serpongs.nama_alasan as nama_alasan')
                ->orderBy('alasan_kenaikan_harga_serpongs.tanggal_input', 'asc')
                ->get();
        return view('backend.pasar_serpong.alasanKenaikanSerpong.index', compact('komoditas','alasan','komoditass','pasar'), ['title' => 'PENYEBAB KENAIKAN HARGA KOMODITAS']);
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
        $alasan = new AlasanKenaikanHargaSerpong();
        $alasan->create($request->all());
        return redirect()->route('alasanSerpong.index')->with('success', 'Harga Hari ini berhasil Diinput');
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
