<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Pasar;
use App\Models\Pedagang;
use Illuminate\Http\Request;

class PedagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Auth()->user();
        $pedagang = Pedagang::with(['kota', 'kecamatan', 'pasar'])->get();
        return view('backend.admin.pedagang.index', compact('pedagang', 'users'), ["title" => "DAFTAR PEDAGANG"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = Auth()->user();
        $kota = Kota::all();
        $kecamatan = Kecamatan::all();
        $pasar = Pasar::all();
        return view('backend.admin.pedagang.create', compact('kota', 'kecamatan', 'pasar', 'users'), ["title" => "TAMBAH PEDAGANG"]);
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
        $pedagang = new Pedagang();
        $pedagang->kota_id = $request->kota_id;
        $pedagang->kecamatan_id = $request->kecamatan_id;
        $pedagang->pasar_id = $request->pasar_id;
        $pedagang->nama_pedagang = $request->nama_pedagang;
        $pedagang->save();

        return redirect('admin/pedagang')->with('success', 'Berhasil Menambahkan Data');
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
        $data = Pedagang::findOrFail($id);
        $kota = Kota::all();
        $kecamatan = Kecamatan::where('kota_id', $data->kota_id)->get();
        $pasar = Pasar::where('kecamatan_id', $data->kecamatan_id)->get();
        return view('backend.admin.pedagang.edit', compact('data', 'kota', 'kecamatan', 'pasar', 'users'), ["title" => "EDIT PEDAGANG"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'nama_pedagang' => $request->nama_pedagang,
            'kecamatan_id' => $request->kecamatan_id,
            'kota_id' => $request->kota_id,
            'pasar_id' => $request->pasar_id,
        ];
        Pedagang::where('id', $id)->update($data);
        return redirect('admin/pedagang')->with('success', 'Berhasil Mengupdate Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the data barang by ID
        $data = Pedagang::findOrFail($id);

        // Perform the deletion
        $data->delete();

        // Redirect back to the list of data barang or any other page as needed
        return redirect('admin/pedagang')->with('success', 'Berhasil Menghapus Data');
    }
}
