<?php

namespace App\Http\Controllers;

use App\Models\DataSurveyor;
use App\Models\Kecamatan;
use App\Models\Komoditas;
use App\Models\KomoditasSemuaPasar;
use App\Models\Pasar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $users = Auth()->user();
        $pasar = DataSurveyor::where('user_id',$users->id)->first();
        $totalKecamatan = Kecamatan::count();
        $totalKomoditas = Komoditas::count();
        $totalPasar = Pasar::count();
        $totalSurveyor = DataSurveyor::count();

        // Ambil data komoditas beserta perubahannya

        return view('backend.admin.dashboard', compact('users', 'pasar', 'totalKecamatan', 'totalPasar', 'totalKomoditas','totalSurveyor'), ["title" => "DASHBOARD"]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Anda Berhasil Logout');
    }

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
