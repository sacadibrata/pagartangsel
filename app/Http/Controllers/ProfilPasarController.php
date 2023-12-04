<?php

namespace App\Http\Controllers;

use App\Models\Pasar;
use App\Models\ProfilPasar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilPasarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Auth()->user();
        $profils = Pasar::with('profilPasar')->get()->slice(1,7);
        return view('backend.admin.profilPasar.index', compact('users', 'profils'), ["title" => "PROFIL PASAR"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = Auth()->user();
        $profils = Pasar::with('profilPasar')->get()->slice(1,7);
        return view('backend.admin.profilPasar.create', compact('users', 'profils'), ["title" => "TAMBAH PROFIL PASAR"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $profil = new ProfilPasar();
        $profil->create($request->all());
        return redirect()->route('profil.index')->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profil = DB::table('profil_pasars')
                    ->join('pasars', 'profil_pasars.pasar_id','pasars.id')
                    ->where('profil_pasars.pasar_id', $id)
                    ->select('profil_pasars.id as id_profil','pasars.id as id_pasar','pasars.nama_pasar as nama_pasar',
                    'profil_pasars.sejarah','profil_pasars.alamat', 'profil_pasars.jam','profil_pasars.luas','profil_pasars.kios',
                    'profil_pasars.los','profil_pasars.jenisBarang','pasars.gambar'
                    )
                    ->get();

        $users = auth()->user();

        return view('backend.admin.profilPasar.show', compact('profil','users'), ['title' => 'DETAIL PROFIL PASAR']);
    }

    public function showFront(string $id)
    {
        $profil = DB::table('profil_pasars')
                    ->join('pasars', 'profil_pasars.pasar_id','pasars.id')
                    ->where('profil_pasars.pasar_id', $id)
                    ->select('profil_pasars.id as id_profil','pasars.id as id_pasar','pasars.nama_pasar as nama_pasar',
                    'profil_pasars.sejarah','profil_pasars.alamat', 'profil_pasars.jam','profil_pasars.luas','profil_pasars.kios',
                    'profil_pasars.los','profil_pasars.jenisBarang','pasars.gambar'
                    )
                    ->get();

        $users = auth()->user();

        return view('frontend.profil.index', compact('profil','users'), ['title' => 'PROFIL PASAR']);
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
