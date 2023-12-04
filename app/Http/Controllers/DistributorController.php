<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Auth()->user();
        $distributors = Kategori::with('distributor')->get();
        return view('backend.admin.distributor.index', compact('users', 'distributors'), ["title" => "DAFTAR DISTRIBUTOR"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $distributors = Kategori::with('distributor')->get();
        $users = Auth()->user();
        return view('backend.admin.distributor.create', compact('users', 'distributors'), ["title" => "TAMBAH PROFIL PASAR"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $gmbrDst = $request->gambar;
        $gambarDistributor = date('Y-m-d')."-".$gmbrDst->getClientOriginalName();
        $gmbrDst->move(public_path().'/distributor', $gambarDistributor);

        $dist = new Distributor();
        $dist->kategori_id = $request->kategori_id;
        $dist->nama = $request->nama;
        $dist->alamat = $request->alamat;
        $dist->telepon = $request->telepon;
        $dist->longitude = $request->longitude;
        $dist->latitude = $request->latitude;
        $dist->url = $request->url;
        $dist->gambar = $gambarDistributor;
        $dist->save();
        return redirect()->route('distributor.index')->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $distributors = DB::table('distributors')
                    ->join('kategoris', 'distributors.kategori_id','kategoris.id')
                    ->where('distributors.kategori_id', $id)
                    ->select('distributors.id as id_distributor','kategoris.id as id_kategori','kategoris.nama_kategori as nama_kategori',
                    'distributors.nama','distributors.alamat', 'distributors.telepon','distributors.latitude',
                    'distributors.longitude','distributors.gambar','distributors.url'
                    )
                    ->get();

        $users = auth()->user();

        return view('backend.admin.distributor.show', compact('distributors','users'), ['title' => 'DAFTAR DISTRIBUTOR']);
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
