<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Komoditas;
use App\Models\KomoditasSemuaPasar;
use App\Models\Satuan;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class KomoditasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Auth()->user();
        $komoditas = Komoditas::paginate(8);
        $kategori = Kategori::all();
        return view('backend.admin.komoditas.index', compact('komoditas', 'kategori', 'users'), ["title" => "KOMODITAS"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = Auth()->user();
        $kategori = Kategori::all();
        $satuan = Satuan::all();
        return view('backend.admin.komoditas.create', compact('kategori', 'satuan', 'users'), ["title" => "TAMBAH KOMODITAS"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $gmbr = $request->gambar;
        $filename = date('Y-m-d')."-".$gmbr->getClientOriginalName();
        $gmbr->move(public_path().'/komoditas', $filename);
        $komoditas = new Komoditas();
        $komoditas->nama_komoditas = $request->nama_komoditas;
        $komoditas->kategori_id = $request->kategori_id;
        $komoditas->satuan_id = $request->satuan_id;
        $komoditas->gambar = $filename;
        $komoditas->save();
        return redirect()->route('komoditas.index')->with('success', 'Berhasil Menambahkan Data');
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
        $data = Komoditas::find($id);
        $kategori = Kategori::all();
        $satuan = Satuan::all();
        return view('backend.admin.komoditas.edit', compact('kategori', 'data', 'satuan', 'users'), ["title" => "EDIT KOMODITAS"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'nama_komoditas' => $request->nama_komoditas,
            'kategori_id' => $request->kategori_id,
            'satuan_id' => $request->satuan_id,
        ];
        Komoditas::where('id', $id)->update($data);
        return redirect()->route('komoditas.index')->with('success', 'Berhasil Mengupdate Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the data barang by ID
        $data = Komoditas::findOrFail($id);

        // Perform the deletion
        $data->delete();

        // Redirect back to the list of data barang or any other page as needed
        return redirect()->route('komoditas.index')->with('success', 'Berhasil Menghapus Data');
    }
}
