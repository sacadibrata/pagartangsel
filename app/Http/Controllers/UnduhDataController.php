<?php

namespace App\Http\Controllers;

use App\Exports\PendataansExport;
use App\Models\Komoditas;
use App\Models\Pasar;
use App\Models\Pendataan;
use App\Models\PendataanAll;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class UnduhDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function bydate(Request $request)
    {
        $tanggalFilter = $request->input('tanggal');

        $pendataans = PendataanAll::with(['komoditas.kategori', 'komoditas.satuan'])
                        ->where('tanggal_input', $tanggalFilter)
                        ->get();

        return view('backend.admin.unduh.bydate', compact('pendataans'), ['title' => 'DETAIL KOMODITAS']);
    }

    public function exportByDate(Request $request)
    {
        $tanggalFilter = $request->input('tanggal');
        return (new PendataansExport($tanggalFilter))->download('pendataans.xlsx');
    }

    public function exportForm()
    {
        return view('export.form');
    }

    public function bydateandpasar(Request $request)
    {
        $tanggalFilter = $request->input('tanggal');
        $pasarFilter = $request->input('pasar_id');

        $pendataans = PendataanAll::with(['komoditas.kategori', 'komoditas.satuan'])
                        ->where('tanggal_input', $tanggalFilter)
                        ->where('pasar_id', $pasarFilter)
                        ->get();

        $pasars = Pasar::all();

        return view('backend.admin.unduh.bydateandpasar', compact('pendataans','pasars'), ['title' => 'DETAIL KOMODITAS']);
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
