<?php

namespace App\Http\Controllers;

use App\Models\DataSurveyor;
use App\Models\KomoditasCeger;
use App\Models\KomoditasCimanggis;
use App\Models\KomoditasJengkol;
use App\Models\KomoditasJombang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StafPsJombangController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function dashboard()
     {
     $users = auth()->user();
     $pasar = DataSurveyor::where('user_id',$users->id)->first();
     $komoditas = KomoditasJombang::with('pendataanjombang')->get();
         return view('backend.pasar_jombang.dashboard', compact('pasar','users', 'komoditas'), ["title" => "DASHBOARD"]);
     }

     public function logout()
     {
         Auth::logout();
         return redirect('/')->with('success', 'Anda Berhasil Logout');
     }

    public function index()
    {
        //
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
