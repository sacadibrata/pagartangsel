<?php

namespace App\Http\Controllers;

use App\Models\DataSurveyor;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Pasar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataSurveyorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Auth()->user();
        $surveyor = DataSurveyor::with(['kota', 'kecamatan', 'pasar', 'user'])->get();
        return view('backend.admin.datasurveyor.index', compact('surveyor', 'users'), ["title" => "DAFTAR SURVEYOR"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = Auth()->user();
        $kotas = Kota::all();
        $surveyorUsers = User::all();
        return view('backend.admin.datasurveyor.create', compact('kotas', 'users', 'surveyorUsers'), ["title" => "TAMBAH SURVEYOR"]);
    }
    public function getKecamatan($id)
    {
        $kecamatans = Kecamatan::where('kota_id', $id)->get();
        return response()->json($kecamatans);
    }
    public function getPasar($id)
    {
        $pasars = Pasar::where('kecamatan_id', $id)->get();
        return response()->json($pasars);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $surveyor = new DataSurveyor();
        $surveyor->kota_id = $request->kota_id;
        $surveyor->kecamatan_id = $request->kecamatan_id;
        $surveyor->pasar_id = $request->pasar_id;
        $surveyor->user_id = $request->user_id;
        $surveyor->save();

        return redirect()->route('datasurveyor.index')->with('success', 'Berhasil Menambahkan Data');
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
        $users = Auth()->user();
        $data = DataSurveyor::findOrFail($id);
        $kotas = Kota::all();
        $surveyorUsers = User::all();
        $kecamatans = Kecamatan::where('kota_id', $data->kota_id)->get();
        $pasars = Pasar::where('kecamatan_id', $data->kecamatan_id)->get();
        return view('backend.admin.datasurveyor.edit', compact('data','surveyorUsers', 'kotas', 'kecamatans', 'pasars', 'users'), ["title" => "EDIT SURVEYOR"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $data = [
        'user_id' => $request->user_id,
        'kecamatan_id' => $request->kecamatan_id,
        'kota_id' => $request->kota_id,
        'pasar_id' => $request->pasar_id,
    ];
    DataSurveyor::where('id', $id)->update($data);
    return redirect()->route('datasurveyor.index')->with('success', 'Berhasil Mengupdate Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the data barang by ID
        $data = DataSurveyor::findOrFail($id);

        // Perform the deletion
        $data->delete();

        // Redirect back to the list of data barang or any other page as needed
        return redirect()->route('datasurveyor.index')->with('success', 'Berhasil Menghapus Data');
    }
}
