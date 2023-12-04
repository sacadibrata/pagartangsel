<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = Auth()->user();
        $kategori = Kategori::all();
        return view('backend.admin.kategori.index', compact('kategori', 'users'), ["title" => "KATEGORI"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = Auth()->user();
        $kategori = Kategori::all();
        return view('backend.admin.kategori.create', compact('kategori', 'users'), ["title" => "TAMBAH KATEGORI"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => 'required|string',
            'gambar_kategori' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Validasi untuk gambar
        ]);

        $gmbrKtgr = $request->file('gambar_kategori'); // Gunakan file() untuk mendapatkan file gambar
        $gambarKtgr = date('Y-m-d') . "-" . $gmbrKtgr->getClientOriginalName();
        $gmbrKtgr->move(public_path('kategori'), $gambarKtgr);

        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->gambar_kategori = $gambarKtgr;
        $kategori->save();

        return redirect()->route('kategori.index')->with('success', 'Berhasil Menambahkan Data');
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
        $data = Kategori::find($id);
        return view('backend.admin.kategori.edit', compact('data', 'users'), ["title" => "EDIT KATEGORI"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kategori' => 'required',

        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi',
        ]);
        $data = [
            'nama_kategori' => $request->nama_kategori,
        ];
        Kategori::where('id', $id)->update($data);
        return redirect('backend/admin/kategori')->with('success', 'Berhasil Mengupdate Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the data barang by ID
        $data = Kategori::findOrFail($id);

        // Perform the deletion
        $data->delete();

        // Redirect back to the list of data barang or any other page as needed
        return redirect('backend/admin/kategori')->with('success', 'Berhasil Menghapus Data');
    }
}
