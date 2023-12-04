<?php

namespace App\Http\Controllers;

use App\Models\KomoditasCeger;
use App\Models\ReasonCeger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReasonCegerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = auth()->user();
        $komoditas = KomoditasCeger::with('reasonCeger')->get();
        return view('backend.pasar_ceger.reasonCeger.index', compact('komoditas','users'), ['title' => 'DAFTAR PENYEBAB KENAIKAN HARGA']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = auth()->user();
        $komoditas = KomoditasCeger::with('reasonCeger')->get();
        return view('backend.pasar_ceger.reasonCeger.create', compact('komoditas','users'), ['title' => 'PENYEBAB KENAIKAN HARGA']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reason = new ReasonCeger();
        $reason->create($request->all());
        return redirect()->route('reasonCeger.index')->with('success', 'Penyebab Kenaikan Harga berhasil Diinput');
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
