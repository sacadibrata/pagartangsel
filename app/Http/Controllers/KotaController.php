<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Auth()->user();
        $kotas = Kota::all();
        return view('backend.admin.kota.index', ['kotas' => $kotas, 'users' => $users, "title" => "KOTA"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kotas = Kota::all();
        $users = Auth()->user();
        return view('backend.admin.kota.create', ['users' => $users, 'kotas' => $kotas, "title" => "TAMBAH KOTA"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kota = new Kota();
        $kota->create($request->all());
        return redirect()->route('kota.index')->with('success', 'Berhasil Menambahkan Data');
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
        $kotas = Kota::find($id);
        return view('backend.admin.kota.edit', ['kotas' => $kotas, 'users' => $users, "title" => "EDIT KOTA"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kotas = [
            'nama_kota' => $request->nama_kota,
        ];
        Kota::where('id', $id)->update($kotas);
        return redirect('backend/admin/kota')->with('success', 'Berhasil Mengupdate Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the data barang by ID
        $data = Kota::findOrFail($id);

        // Perform the deletion
        $data->delete();

        // Redirect back to the list of data barang or any other page as needed
        return redirect('backend/admin/kota')->with('success', 'Berhasil Menghapus Data');
    }
}
