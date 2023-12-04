<?php

namespace App\Http\Controllers;

use App\Models\KomoditasJengkol;
use App\Models\KomoditasJombang;
use App\Models\ReasonJengkol;
use App\Models\ReasonJombang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReasonJengkolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = auth()->user();
        $komoditas = KomoditasJengkol::with('reasonJengkol')->get();
        return view('backend.pasar_jengkol.reasonJengkol.index', compact('komoditas','users'), ['title' => 'DAFTAR PENYEBAB KENAIKAN HARGA']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = auth()->user();
        $komoditas = KomoditasJengkol::with('reasonJengkol')->get();
        return view('backend.pasar_jengkol.reasonJengkol.create', compact('komoditas','users'), ['title' => 'PENYEBAB KENAIKAN HARGA']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reason = new ReasonJengkol();
        $reason->create($request->all());
        return redirect()->route('reasonJengkol.index')->with('success', 'Penyebab Kenaikan Harga berhasil Diinput');
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
