<?php

namespace App\Http\Controllers;

use App\Models\Komoditas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrafikHargaAllController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komoditas = Komoditas::with('pendataan')->get();
        return view('backend.admin.grafik.index', compact('komoditas'), ['title' => 'GRAFIK HARGA']);
    }

    public function satubulan()
    {
        $startDate = now()->subMonth(); // Tanggal satu bulan yang lalu
        $endDate = now(); // Tanggal saat ini
        $pendataan = DB::table('pendataan_ps_ciputats')
                ->join('komoditas', 'pendataan_ps_ciputats.komoditas_id','komoditas.id')
                ->select(DB::raw('DATE_FORMAT(tanggal_input, "%Y-%m-%d") as date'), 'komoditas.nama_komoditas as nama_komoditas', DB::raw('AVG(pendataan_ps_ciputats.average_harga) as average_harga'))
                ->whereBetween('tanggal_input', [$startDate, $endDate])
                ->groupBy('date', 'nama_komoditas')
                ->orderBy('date', 'asc')
                ->get();
        return view('backend.admin.grafik.month', compact('pendataan'), ['title' => 'GRAFIK HARGA 30 HARI TERAKHIR']);
    }

    public function tampil($id)
    {
        $pendataan = DB::table('pendataan_alls')
                    ->join('komoditas', 'pendataan_alls.komoditas_id','komoditas.id')
                    ->where('pendataan_alls.komoditas_id', $id)
                    ->select('pendataan_alls.id','pendataan_alls.tanggal_input','komoditas.id as id_komoditas','komoditas.nama_komoditas as nama_komoditas','pendataan_alls.harga_pedagang_1','pendataan_alls.harga_pedagang_2','pendataan_alls.harga_pedagang_3','pendataan_alls.average_harga')
                    ->orderBy('pendataan_alls.tanggal_input', 'asc')
                    ->get();

        return view('backend.admin.grafik.tampil', ['pendataan' => $pendataan, 'title'=>'GRAFIK HARGA KOMODITI']);
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
