<?php

namespace App\Http\Controllers;

use App\Models\KomoditasCiputat;
use App\Models\ReasonCiputat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReasonCiputatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = auth()->user();
        $komoditas = KomoditasCiputat::with('reasonCiputat')->get();
        return view('backend.pasar_ciputat.reasonCiputat.index', compact('komoditas','users'), ['title' => 'DAFTAR PENYEBAB KENAIKAN HARGA']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = auth()->user();
        $komoditas = KomoditasCiputat::with('reasonCiputat')->get();
        return view('backend.pasar_ciputat.reasonCiputat.create', compact('komoditas','users'), ['title' => 'TAMBAH PENYEBAB KENAIKAN HARGA']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reason = new ReasonCiputat();
        $reason->create($request->all());
        return redirect()->route('reasonCiputat.index')->with('success', 'Penyebab Kenaikan Harga berhasil Diinput');
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
