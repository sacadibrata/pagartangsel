<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Auth()->user();
        $satuans = Satuan::all();
        return view('backend.admin.satuan.index', compact('users', 'satuans'), ["title" => "SATUAN"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = Auth()->user();
        $satuans = Satuan::all();
        return view('backend.admin.satuan.create', compact('users', 'satuans'), ["title" => "TAMBAH SATUAN"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $satuan = new Satuan();
        $satuan->create($request->all());
        return redirect()->route('satuan.index')->with('success', 'Berhasil Menambahkan Data');
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
        $data = satuan::find($id);
        return view('backend.admin.satuan.edit', compact('users', 'data'), ["title" => "EDIT SATUAN"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_satuan' => 'required',

        ], [
            'nama_satuan.required' => 'Nama Satuan wajib diisi',

        ]);
        $data = [

            'nama_satuan' => $request->nama_satuan,
        ];
        Satuan::where('id', $id)->update($data);
        return redirect('backend/admin/satuan')->with('success', 'Berhasil Mengupdate Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the data barang by ID
        $data = Satuan::findOrFail($id);

        // Perform the deletion
        $data->delete();

        // Redirect back to the list of data barang or any other page as needed
        return redirect()->route('satuan.index')->with('success', 'Berhasil Menghapus Data');
    }
}
