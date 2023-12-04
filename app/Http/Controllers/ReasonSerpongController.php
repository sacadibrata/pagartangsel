<?php

namespace App\Http\Controllers;

use App\Models\DataSurveyor;
use App\Models\KomoditasJombang;
use App\Models\KomoditasSerpong;
use App\Models\ReasonJombang;
use App\Models\ReasonSerpong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReasonSerpongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = auth()->user();
        $komoditas = KomoditasSerpong::with('reasonSerpong')->get();
        return view('backend.pasar_serpong.reason.index', compact('komoditas','users'), ['title' => 'DAFTAR PENYEBAB KENAIKAN HARGA']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = auth()->user();
        $komoditas = KomoditasSerpong::with('reasonSerpong')->get();
        return view('backend.pasar_serpong.reason.create', compact('komoditas','users'), ['title' => 'PENYEBAB KENAIKAN HARGA']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reason = new ReasonSerpong();
        $reason->create($request->all());
        return redirect()->route('reasonSerpong.index')->with('success', 'Penyebab Kenaikan Harga berhasil Diinput');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pendataan = DB::table('pendataan_ps_serpongs')
        ->join('komoditas', 'pendataan_ps_serpongs.komoditas_id','komoditas.id')
        ->where('pendataan_ps_serpongs.komoditas_id', $id)
        ->select('pendataan_ps_serpongs.id as id_pendataan','komoditas.id as id_komoditas','pendataan_ps_serpongs.tanggal_input','komoditas.nama_komoditas as nama_komoditas','pendataan_ps_serpongs.harga_pedagang_1','pendataan_ps_serpongs.harga_pedagang_2','pendataan_ps_serpongs.harga_pedagang_3','pendataan_ps_serpongs.average_harga')
        ->orderBy('pendataan_ps_serpongs.tanggal_input', 'asc')
        ->get();

        return view('backend.pasar_serpong.reason.show', compact('pendataan'), ['title' => 'DETAIL KOMODITAS']);
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
