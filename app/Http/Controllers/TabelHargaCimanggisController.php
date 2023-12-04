<?php

namespace App\Http\Controllers;

use App\Models\KomoditasCimanggis;
use Illuminate\Http\Request;

class TabelHargaCimanggisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komoditas = KomoditasCimanggis::with('pendataancimanggis')->get();
        return view('backend.pasar_cimanggis.tabelharga.index', compact('komoditas'), ['title' => 'TABEL HARGA']);
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
