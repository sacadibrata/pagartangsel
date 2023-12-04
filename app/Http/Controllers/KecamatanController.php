<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kota;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Auth()->user();
        $kecamatan = Kecamatan::with('kota')->get();
        return view('backend.admin.kecamatan.index', compact('kecamatan', 'users'), ["title" => "KECAMATAN"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = Auth()->user();
        $kota = Kota::all();
        return view('backend.admin.kecamatan.create', compact('kota', 'users'), ["title" => "TAMBAH KECAMATAN"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       dd($request->all());
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
        $data = Kecamatan::find($id);
        $kota = Kota::all();
        return view('backend.admin.kecamatan.edit', ['users' => $users, 'data' => $data, 'kota' => $kota, "title" => "EDIT KECAMATAN"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'kota_id' => $request->kota_id,
            'nama_kec' => $request->nama_kec,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ];
        Kecamatan::where('id', $id)->update($data);
        return redirect('backend/admin/kecamatan')->with('success', 'Berhasil Mengupdate Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the data barang by ID
        $data = Kecamatan::findOrFail($id);

        // Perform the deletion
        $data->delete();

        // Redirect back to the list of data barang or any other page as needed
        return redirect('backend/admin/kecamatan')->with('success', 'Berhasil Menghapus Data');
    }
}
