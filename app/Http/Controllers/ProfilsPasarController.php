<?php

namespace App\Http\Controllers;

use App\Models\Pasar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilsPasarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profils = Pasar::with('profilPasar')->get()->slice(1,7);
        return view('frontend.profil.index', compact('profils'), ["title" => "PROFIL PASAR"]);
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


        return view('frontend.profil.show', compact('profil'), ['title' => 'PROFIL PASAR']);
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
