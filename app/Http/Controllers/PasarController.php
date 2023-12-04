<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Pasar;
use Illuminate\Http\Request;

class PasarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Auth()->user();
        $pasar = Pasar::with(['kota', 'kecamatan'])->get();
        return view('backend.admin.pasar.index', compact('pasar', 'users'), ["title" => "DAFTAR PASAR"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = Auth()->user();
        $kotas = Kota::all();
        return view('backend.admin.pasar.create', compact('kotas', 'users'), ["title" => "TAMBAH PASAR"]);
    }
    public function getKecamatan($id)
    {
        $kecamatans = Kecamatan::where('kota_id', $id)->get();
        return response()->json($kecamatans);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $gmbrPasar = $request->gambar;
        $gambarPasar = date('Y-m-d')."-".$gmbrPasar->getClientOriginalName();
        $gmbrPasar->move(public_path().'/pasar', $gambarPasar);

        $pasar = new Pasar();
        $pasar->nama_pasar = $request->nama_pasar;
        $pasar->kota_id = $request->kota_id;
        $pasar->kecamatan_id = $request->kecamatan_id;
        $pasar->longitude = $request->longitude;
        $pasar->latitude = $request->latitude;
        $pasar->gambar = $gambarPasar;
        $pasar->save();
        return redirect()->route('pasar.index')->with('success', 'Berhasil Menambahkan Data');
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
        $data = Pasar::findOrFail($id);
        $kotas = Kota::all();
        $kecamatans = kecamatan::where('kota_id', $data->kota_id)->get();
        return view('backend.admin.pasar.edit', compact('data', 'kotas', 'kecamatans', 'users'), ["title" => "EDIT PASAR"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'nama_pasar' => $request->nama_pasar,
            'kecamatan_id' => $request->kecamatan_id,
            'kota_id' => $request->kota_id,
        ];

        // Update the Pasar data based on the ID
        Pasar::where('id', $id)->update($data);

        // Handle the image upload if a new image is provided
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarPasar = $gambar->getClientOriginalName();
            $gambar->move(public_path().'/pasar', $gambarPasar);

            // Update the 'gambar' field in the database
            Pasar::where('id', $id)->update(['gambar' => $gambarPasar]);
        }
        return redirect('backend/admin/pasar')->with('success', 'Berhasil Mengupdate Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the data barang by ID
        $data = Pasar::findOrFail($id);

        // Perform the deletion
        $data->delete();

        // Redirect back to the list of data barang or any other page as needed
        return redirect()->route('pasar.index')->with('success', 'Berhasil Menghapus Data');
    }
}
