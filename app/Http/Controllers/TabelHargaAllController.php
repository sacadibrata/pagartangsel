<?php

namespace App\Http\Controllers;

use App\Models\Komoditas;
use App\Models\KomoditasCeger;
use App\Models\KomoditasCimanggis;
use App\Models\KomoditasCiputat;
use App\Models\KomoditasJengkol;
use App\Models\KomoditasJombang;
use App\Models\KomoditasSemuaPasar;
use App\Models\KomoditasSerpong;
use Illuminate\Http\Request;

class TabelHargaAllController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexSemuaPasar()
    {
        $komoditas = KomoditasSemuaPasar::with('pendataansemuapasar')->get();
        return view('backend.admin.tabelharga.indexSemuaPasar', compact('komoditas'), ['title' => 'TABEL HARGA RATA-RATA SEMUA PASAR']);
    }

    public function indexCeger()
    {
        $komoditas = KomoditasCeger::with('pendataanceger')->get();
        return view('backend.admin.tabelharga.indexCeger', compact('komoditas'), ['title' => 'TABEL HARGA RATA-RATA SEMUA PASAR']);
    }

    public function indexSerpong()
    {
        $komoditas = KomoditasSerpong::with('pendataanserpong')->get();
        return view('backend.admin.tabelharga.indexSerpong', compact('komoditas'), ['title' => 'TABEL HARGA RATA-RATA SEMUA PASAR']);
    }

    public function indexCiputat()
    {
        $komoditas = KomoditasCiputat::with('pendataanciputat')->get();
        return view('backend.admin.tabelharga.indexCiputat', compact('komoditas'), ['title' => 'TABEL HARGA RATA-RATA SEMUA PASAR']);
    }

    public function indexJombang()
    {
        $komoditas = KomoditasJombang::with('pendataanjombang')->get();
        return view('backend.admin.tabelharga.indexJombang', compact('komoditas'), ['title' => 'TABEL HARGA RATA-RATA SEMUA PASAR']);
    }

    public function indexCimanggis()
    {
        $komoditas = KomoditasCimanggis::with('pendataancimanggis')->get();
        return view('backend.admin.tabelharga.indexCimanggis', compact('komoditas'), ['title' => 'TABEL HARGA RATA-RATA SEMUA PASAR']);
    }

    public function indexJengkol()
    {
        $komoditas = KomoditasJengkol::with('pendataanjengkol')->get();
        return view('backend.admin.tabelharga.indexJengkol', compact('komoditas'), ['title' => 'TABEL HARGA RATA-RATA SEMUA PASAR']);
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
