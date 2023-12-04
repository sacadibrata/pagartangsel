<?php

namespace App\Http\Controllers;

use App\Models\AlasanKenaikanHargaJombang;
use App\Models\DataSurveyor;
use App\Models\KomoditasJombang;
use App\Models\ReasonJombang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlasanKenaikanHargaJombangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $pasar = DataSurveyor::where('user_id',$user->id)->first();
        $komoditas = KomoditasJombang::with('pendataanjombang','reasonJombang','alasannaikhargajombang')->get();
        $komoditass = KomoditasJombang::with('reasonJombang')->get();
        $alasan = DB::table('alasan_kenaikan_harga_jombangs')
                ->join('komoditas', 'alasan_kenaikan_harga_jombangs.komoditas_id','komoditas.id')
                ->join('reason_jombangs', 'alasan_kenaikan_harga_jombangs.reason_id','reason_jombangs.id')
                ->select('alasan_kenaikan_harga_jombangs.komoditas_id','komoditas.id as id_komoditas','reason_jombangs.id as id_reason','alasan_kenaikan_harga_jombangs.tanggal_input as tanggal_input','reason_jombangs.nama_alasan as nama_alasan')
                ->orderBy('alasan_kenaikan_harga_jombangs.tanggal_input', 'asc')
                ->get();
        return view('backend.pasar_jombang.alasanKenaikanJombang.index', compact('komoditas','alasan','komoditass','pasar'), ['title' => 'TABEL HARGA']);
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
        $alasan = new AlasanKenaikanHargaJombang();
        $alasan->create($request->all());
        return redirect()->route('alasanJombang.index')->with('success', 'Harga Hari ini berhasil Diinput');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pendataan = DB::table('pendataan_ps_jombangs')
        ->join('komoditas', 'pendataan_ps_jombangs.komoditas_id','komoditas.id')
        ->where('pendataan_ps_jombangs.komoditas_id', $id)
        ->select('pendataan_ps_jombangs.id as id_pendataan','komoditas.id as id_komoditas','pendataan_ps_jombangs.tanggal_input','komoditas.nama_komoditas as nama_komoditas','pendataan_ps_jombangs.harga_pedagang_1','pendataan_ps_jombangs.harga_pedagang_2','pendataan_ps_jombangs.harga_pedagang_3','pendataan_ps_jombangs.average_harga')
        ->orderBy('pendataan_ps_jombangs.tanggal_input', 'asc')
        ->get();

        return view('backend.pasar_jombang.alasanKenaikan.show', compact('pendataan'), ['title' => 'DETAIL KOMODITAS']);
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
