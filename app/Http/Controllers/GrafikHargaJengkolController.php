<?php

namespace App\Http\Controllers;

use App\Models\KomoditasCeger;
use App\Models\KomoditasJengkol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrafikHargaJengkolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komoditas = KomoditasJengkol::with('pendataanjengkol')->get();
        return view('backend.pasar_jengkol.grafik.index', compact('komoditas'), ['title' => 'GRAFIK HARGA']);
    }

    public function tampil($id)
    {
        $pendataan = DB::table('pendataan_ps_jengkols')
                    ->join('komoditas', 'pendataan_ps_jengkols.komoditas_id','komoditas.id')
                    ->where('pendataan_ps_jengkols.komoditas_id', $id)
                    ->select('pendataan_ps_jengkols.id','pendataan_ps_jengkols.tanggal_input','komoditas.id as id_komoditas','komoditas.nama_komoditas as nama_komoditas','pendataan_ps_jengkols.harga_pedagang_1','pendataan_ps_jengkols.harga_pedagang_2','pendataan_ps_jengkols.harga_pedagang_3','pendataan_ps_jengkols.average_harga')
                    ->orderBy('pendataan_ps_jengkols.tanggal_input', 'asc')
                    ->get();

        return view('backend.pasar_jengkol.grafik.tampil', ['pendataan' => $pendataan, 'title'=>'GRAFIK HARGA KOMODITI']);
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
        //
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
