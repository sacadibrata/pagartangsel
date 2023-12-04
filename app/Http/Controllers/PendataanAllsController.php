<?php

namespace App\Http\Controllers;

use App\Models\DataSurveyor;
use App\Models\GabunganData;
use App\Models\GabungData;
use App\Models\Komoditas;
use App\Models\KomoditasCeger;
use App\Models\KomoditasCimanggis;
use App\Models\KomoditasCiputat;
use App\Models\KomoditasJengkol;
use App\Models\KomoditasJombang;
use App\Models\KomoditasSemuaPasar;
use App\Models\KomoditasSerpong;
use App\Models\Pasar;
use App\Models\PendataanAll;
use App\Models\PendataanHargaSemuaPasar;
use App\Models\PendataanPsCeger;
use App\Models\PendataanPsCimanggis;
use App\Models\PendataanPsCiputat;
use App\Models\PendataanPsJengkol;
use App\Models\PendataanPsJombang;
use App\Models\PendataanPsSerpong;
use App\Models\ResumeKomoditiSemuaHarga;
use App\Models\ResumePendataanHargaPasar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendataanAllsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function indexGabungData()
    {
        $users = auth()->user();
        return view('backend.admin.pendataanAll.indexGabungData',compact('users'))->with(['title' => 'Gabung Data']);
    }

    public function aggregateData()
    {
            // Ambil data dari tabel-tabel survei
            $dataCiputats = PendataanPsCiputat::all();
            $dataCimanggis = PendataanPsCimanggis::all();
            $dataJengkols = PendataanPsJengkol::all();
            $dataSerpongs = PendataanPsSerpong::all();
            $dataJombangs = PendataanPsJombang::all();
            $dataCegers = PendataanPsCeger::all();
            $dataSemuaPasar = PendataanHargaSemuaPasar::all();
            $dataAgregat = GabungData::all();

            // Buat array asosiatif untuk mengingat data apa yang sudah ada dalam agregat
            $existingData = [];
            foreach ($dataAgregat as $data) {
                $existingData[$data->average_harga . '-' . $data->pasar_id . '-' . $data->tanggal_input . '-' . $data->komoditas_id] = true;
            }

            // Lakukan penggabungan data dan perhitungan rata-rata harga
            $dataGabungan = [];

            // Lakukan penggabungan data dari setiap tabel survei ke dalam $dataGabungan

            foreach ($dataSemuaPasar as $data) {
                $key = $data->average_harga . '-' . $data->pasar_id . '-' . $data->tanggal_input . '-' . $data->komoditas_id;
                // Lakukan penggabungan data dari tabel Ciputats
                if (!isset($existingData[$key])) {
                    $dataGabungan[] = [
                        'pasar_id' => $data->pasar_id,
                        'tanggal_input' => $data->tanggal_input,
                        'komoditas_id' => $data->komoditas_id,
                        'average_harga' => $data->average_harga
                    ];
                }
            }

            foreach ($dataCimanggis as $data) {
                $key = $data->average_harga . '-' . $data->pasar_id . '-' . $data->tanggal_input . '-' . $data->komoditas_id;
                // Lakukan penggabungan data dari tabel Ciputats
                if (!isset($existingData[$key])) {
                    $dataGabungan[] = [
                        'pasar_id' => $data->pasar_id,
                        'tanggal_input' => $data->tanggal_input,
                        'komoditas_id' => $data->komoditas_id,
                        'average_harga' => $data->average_harga
                    ];
                }
            }

            foreach ($dataCegers as $data) {
                $key = $data->average_harga . '-' . $data->pasar_id . '-' . $data->tanggal_input . '-' . $data->komoditas_id;
                // Lakukan penggabungan data dari tabel Ciputats
                if (!isset($existingData[$key])) {
                    $dataGabungan[] = [
                        'pasar_id' => $data->pasar_id,
                        'tanggal_input' => $data->tanggal_input,
                        'komoditas_id' => $data->komoditas_id,
                        'average_harga' => $data->average_harga
                    ];
                }
            }

            foreach ($dataCiputats as $data) {
                $key = $data->average_harga . '-' . $data->pasar_id . '-' . $data->tanggal_input . '-' . $data->komoditas_id;
                // Lakukan penggabungan data dari tabel Ciputats
                if (!isset($existingData[$key])) {
                    $dataGabungan[] = [
                        'pasar_id' => $data->pasar_id,
                        'tanggal_input' => $data->tanggal_input,
                        'komoditas_id' => $data->komoditas_id,
                        'average_harga' => $data->average_harga
                    ];
                }
            }

            foreach ($dataJengkols as $data) {
                $key = $data->average_harga . '-' . $data->pasar_id . '-' . $data->tanggal_input . '-' . $data->komoditas_id;
                // Lakukan penggabungan data dari tabel Ciputats
                if (!isset($existingData[$key])) {
                    $dataGabungan[] = [
                        'pasar_id' => $data->pasar_id,
                        'tanggal_input' => $data->tanggal_input,
                        'komoditas_id' => $data->komoditas_id,
                        'average_harga' => $data->average_harga
                    ];
                }
            }

            foreach ($dataJombangs as $data) {
                $key = $data->average_harga . '-' . $data->pasar_id . '-' . $data->tanggal_input . '-' . $data->komoditas_id;
                // Lakukan penggabungan data dari tabel Ciputats
                if (!isset($existingData[$key])) {
                    $dataGabungan[] = [
                        'pasar_id' => $data->pasar_id,
                        'tanggal_input' => $data->tanggal_input,
                        'komoditas_id' => $data->komoditas_id,
                        'average_harga' => $data->average_harga
                    ];
                }
            }

            foreach ($dataSerpongs as $data) {
                $key = $data->average_harga . '-' . $data->pasar_id . '-' . $data->tanggal_input . '-' . $data->komoditas_id;
                // Lakukan penggabungan data dari tabel Ciputats
                if (!isset($existingData[$key])) {
                    $dataGabungan[] = [
                        'pasar_id' => $data->pasar_id,
                        'tanggal_input' => $data->tanggal_input,
                        'komoditas_id' => $data->komoditas_id,
                        'average_harga' => $data->average_harga
                    ];
                }
            }

            // Simpan data agregat ke dalam tabel "PendataanHargaSemuaPasars"
            GabungData::insert($dataGabungan);

            // Redirect atau tampilkan pesan sukses jika diperlukan
            return redirect()->route('pendataanAll.indexGabungData')->with('success', 'Harga Hari Ini Sudah Digabungkan');

    }

     public function indexSemuaPasar()
     {
         // Mengambil informasi pengguna yang saat ini login
         $users = auth()->user();
         $pasar = DataSurveyor::where('user_id',$users->id)->first();
         $komoditasSemuaPasar = KomoditasSemuaPasar::with('pendataansemuapasar','pendataanceger','pendataanciputat','pendataanjombang','pendataanserpong','pendataanjengkol','pendataancimanggis')->get();
         return view('backend.admin.pendataanAll.indexSemuaPasar', compact('users', 'komoditasSemuaPasar','pasar'))
         ->with(['title' => 'List Price Product']);
     }

     public function indexCeger()
    {
        // Mengambil informasi pengguna yang saat ini login
        $users = auth()->user();
        $pasars = Pasar ::all()->where('id','2');
        $pasar = DataSurveyor::where('user_id',$users->id)->first();
        $komoditas = KomoditasCeger::with('pendataanceger')->get();
        return view('backend.admin.pendataanAll.indexCeger', compact('users','pasars', 'komoditas','pasar'))->with(['title' => 'List Price Product']);
    }

    public function indexCiputat()
    {
        // Mengambil informasi pengguna yang saat ini login
        $users = auth()->user();
        $pasars = Pasar ::all()->where('id','4');
        $pasar = DataSurveyor::where('user_id',$users->id)->first();
        $komoditas = KomoditasCiputat::with('pendataanciputat')->get();
        return view('backend.admin.pendataanAll.indexCiputat', compact('users', 'pasars', 'komoditas','pasar'))->with(['title' => 'List Price Product']);
    }

    public function indexJombang()
    {
        // Mengambil informasi pengguna yang saat ini login
        $users = auth()->user();
        $pasars = Pasar ::all()->where('id','6');
        $pasar = DataSurveyor::where('user_id',$users->id)->first();
        $komoditas = KomoditasJombang::with('pendataanjombang')->get();
        return view('backend.admin.pendataanAll.indexJombang', compact('users', 'pasars', 'komoditas','pasar'))->with(['title' => 'List Price Product']);
    }

    public function indexSerpong()
    {
        // Mengambil informasi pengguna yang saat ini login
        $users = auth()->user();
        $pasars = Pasar ::all()->where('id','7');
        $pasar = DataSurveyor::where('user_id',$users->id)->first();
        $komoditas = KomoditasSerpong::with('pendataanserpong')->get();
        return view('backend.admin.pendataanAll.indexSerpong', compact('users', 'pasars', 'komoditas','pasar'))->with(['title' => 'List Price Product']);
    }

    public function indexJengkol()
    {
        // Mengambil informasi pengguna yang saat ini login
        $users = auth()->user();
        $pasars = Pasar ::all()->where('id','5');
        $pasar = DataSurveyor::where('user_id',$users->id)->first();
        $komoditas = KomoditasJengkol::with('pendataanjengkol')->get();
        return view('backend.admin.pendataanAll.indexJengkol', compact('users','pasars', 'komoditas','pasar'))->with(['title' => 'List Price Product']);
    }

    public function indexCimanggis()
    {
        // Mengambil informasi pengguna yang saat ini login
        $users = auth()->user();
        $pasars = Pasar ::all()->where('id','3');
        $pasar = DataSurveyor::where('user_id',$users->id)->first();
        $komoditas = KomoditasCimanggis::with('pendataancimanggis')->get();
        return view('backend.admin.pendataanAll.indexCimanggis', compact('users','pasars', 'komoditas','pasar'))->with(['title' => 'List Price Product']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pendataan = new PendataanAll();
        $pendataan->create($request->all());
        return redirect()->route('pendataanAll.indexSemuaPasar')->with('success', 'Harga Hari ini berhasil Diinput');
    }

    public function storeSemuaPasar(Request $request)
    {
        $pendataan = new PendataanHargaSemuaPasar();
        $pendataan->create($request->all());
        return redirect()->route('pendataanAll.indexSemuaPasar')->with('success', 'Harga Hari ini berhasil Diinput');
    }

    public function storeCeger(Request $request)
    {
        $pendataan = new PendataanPsCeger();
        $pendataan->create($request->all());
        return redirect()->route('pendataanAll.indexCeger')->with('success', 'Harga Hari ini berhasil Diinput');
    }

    public function storeCimanggis(Request $request)
    {
        $pendataan = new PendataanPsCimanggis();
        $pendataan->create($request->all());
        return redirect()->route('pendataanAll.indexCimanggis')->with('success', 'Harga Hari ini berhasil Diinput');
    }

    public function storeCiputat(Request $request)
    {
        $pendataan = new PendataanPsCiputat();
        $pendataan->create($request->all());
        return redirect()->route('pendataanAll.indexCiputat')->with('success', 'Harga Hari ini berhasil Diinput');
    }

    public function storeJengkol(Request $request)
    {
        $pendataan = new PendataanPsJengkol();
        $pendataan->create($request->all());
        return redirect()->route('pendataanAll.indexJengkol')->with('success', 'Harga Hari ini berhasil Diinput');
    }

    public function storeJombang(Request $request)
    {
        $pendataan = new PendataanPsJombang();
        $pendataan->create($request->all());
        return redirect()->route('pendataanAll.indexJombang')->with('success', 'Harga Hari ini berhasil Diinput');
    }

    public function storeSerpong(Request $request)
    {
        $pendataan = new PendataanPsSerpong();
        $pendataan->create($request->all());
        return redirect()->route('pendataanAll.indexSerpong')->with('success', 'Harga Hari ini berhasil Diinput');
    }

    public function storeResumeHargaPasar(Request $request, $id)
    {
        $resumeHarga = new ResumePendataanHargaPasar();
        $resumeHarga->tanggal_input = $request->tanggal_input;
        $resumeHarga->komoditas_id = $request->komoditas_id;
        $resumeHarga->pendataan_ps_serpongs_id = $request->pendataan_ps_serpongs_id;
        $resumeHarga->pendataan_ps_ciputats_id = $request->pendataan_ps_ciputats_id;
        $resumeHarga->pendataan_ps_jengkols_id = $request->pendataan_ps_jengkols_id;
        $resumeHarga->pendataan_ps_cegers_id = $request->pendataan_ps_cegers_id;
        $resumeHarga->pendataan_ps_cimanggis_id = $request->pendataan_ps_cimanggis_id;
        $resumeHarga->pendataan_ps_jombangs_id = $request->pendataan_ps_jombangs_id;
        $resumeHarga->pendataan_semua_pasars_id = $request->pendataan_semua_pasars_id;
        $resumeHarga->save();

        return redirect()->route('pendataanAll.indexResumeHarga')->with('success', 'Harga Hari ini berhasil Diinput');
    }

    /**
     * Display the specified resource.
     */
    public function showCeger(string $id)
    {
        $pendataan = DB::table('pendataan_ps_cegers')
                    ->join('komoditas', 'pendataan_ps_cegers.komoditas_id','komoditas.id')
                    ->where('pendataan_ps_cegers.komoditas_id', $id)
                    ->select('pendataan_ps_cegers.id as id_pendataan','komoditas.id as id_komoditas','pendataan_ps_cegers.tanggal_input','komoditas.nama_komoditas as nama_komoditas','pendataan_ps_cegers.harga_pedagang_1','pendataan_ps_cegers.harga_pedagang_2','pendataan_ps_cegers.harga_pedagang_3','pendataan_ps_cegers.average_harga')
                    ->orderBy('pendataan_ps_cegers.tanggal_input', 'asc')
                    ->get();

        $komoditas = KomoditasCeger::with('pendataanceger')->get();
        $users = auth()->user();

        return view('backend.admin.pendataanAll.showCeger', compact('pendataan','users'), ['title' => 'DETAIL KOMODITAS']);
    }

    public function showCiputat(string $id)
    {
        $pendataan = DB::table('pendataan_ps_ciputats')
                    ->join('komoditas', 'pendataan_ps_ciputats.komoditas_id','komoditas.id')
                    ->where('pendataan_ps_ciputats.komoditas_id', $id)
                    ->select('pendataan_ps_ciputats.id as id_pendataan','komoditas.id as id_komoditas','pendataan_ps_ciputats.tanggal_input','komoditas.nama_komoditas as nama_komoditas','pendataan_ps_ciputats.harga_pedagang_1','pendataan_ps_ciputats.harga_pedagang_2','pendataan_ps_ciputats.harga_pedagang_3','pendataan_ps_ciputats.average_harga')
                    ->orderBy('pendataan_ps_ciputats.tanggal_input', 'asc')
                    ->get();

        $komoditas = KomoditasCiputat::with('pendataanciputat')->get();
        $users = auth()->user();


        return view('backend.admin.pendataanAll.showCiputat', compact('pendataan','users'), ['title' => 'DETAIL KOMODITAS']);
    }

    public function showJombang(string $id)
    {
        $pendataan = DB::table('pendataan_ps_jombangs')
                    ->join('komoditas', 'pendataan_ps_jombangs.komoditas_id','komoditas.id')
                    ->where('pendataan_ps_jombangs.komoditas_id', $id)
                    ->select('pendataan_ps_jombangs.id as id_pendataan','komoditas.id as id_komoditas','pendataan_ps_jombangs.tanggal_input','komoditas.nama_komoditas as nama_komoditas','pendataan_ps_jombangs.harga_pedagang_1','pendataan_ps_jombangs.harga_pedagang_2','pendataan_ps_jombangs.harga_pedagang_3','pendataan_ps_jombangs.average_harga')
                    ->orderBy('pendataan_ps_jombangs.tanggal_input', 'asc')
                    ->get();

        $users = auth()->user();
        $komoditas = KomoditasJombang::with('pendataanJombang')->get();

        return view('backend.admin.pendataanAll.showJombang', compact('pendataan','users'), ['title' => 'DETAIL KOMODITAS']);
    }

    public function showSerpong(string $id)
    {
        $pendataan = DB::table('pendataan_ps_serpongs')
                    ->join('komoditas', 'pendataan_ps_serpongs.komoditas_id','komoditas.id')
                    ->where('pendataan_ps_serpongs.komoditas_id', $id)
                    ->select('pendataan_ps_serpongs.id as id_pendataan','komoditas.id as id_komoditas','pendataan_ps_serpongs.tanggal_input','komoditas.nama_komoditas as nama_komoditas','pendataan_ps_serpongs.harga_pedagang_1','pendataan_ps_serpongs.harga_pedagang_2','pendataan_ps_serpongs.harga_pedagang_3','pendataan_ps_serpongs.average_harga')
                    ->orderBy('pendataan_ps_serpongs.tanggal_input', 'asc')
                    ->get();

        $users = auth()->user();
        $komoditas = KomoditasSerpong::with('pendataanSerpong')->get();

        return view('backend.admin.pendataanAll.showSerpong', compact('pendataan','users'), ['title' => 'DETAIL KOMODITAS']);
    }

    public function showJengkol(string $id)
    {
        $pendataan = DB::table('pendataan_ps_jengkols')
                    ->join('komoditas', 'pendataan_ps_jengkols.komoditas_id','komoditas.id')
                    ->where('pendataan_ps_jengkols.komoditas_id', $id)
                    ->select('pendataan_ps_jengkols.id as id_pendataan','komoditas.id as id_komoditas','pendataan_ps_jengkols.tanggal_input','komoditas.nama_komoditas as nama_komoditas','pendataan_ps_jengkols.harga_pedagang_1','pendataan_ps_jengkols.harga_pedagang_2','pendataan_ps_jengkols.harga_pedagang_3','pendataan_ps_jengkols.average_harga')
                    ->orderBy('pendataan_ps_jengkols.tanggal_input', 'asc')
                    ->get();

        $users = auth()->user();
        $komoditas = KomoditasJengkol::with('pendataanJengkol')->get();

        return view('backend.admin.pendataanAll.showJengkol', compact('pendataan','users'), ['title' => 'DETAIL KOMODITAS']);
    }

    public function showCimanggis(string $id)
    {
        $pendataan = DB::table('pendataan_ps_cimanggis')
                    ->join('komoditas', 'pendataan_ps_cimanggis.komoditas_id','komoditas.id')
                    ->where('pendataan_ps_cimanggis.komoditas_id', $id)
                    ->select('pendataan_ps_cimanggis.id as id_pendataan','komoditas.id as id_komoditas','pendataan_ps_cimanggis.tanggal_input','komoditas.nama_komoditas as nama_komoditas','pendataan_ps_cimanggis.harga_pedagang_1','pendataan_ps_cimanggis.harga_pedagang_2','pendataan_ps_cimanggis.harga_pedagang_3','pendataan_ps_cimanggis.average_harga')
                    ->orderBy('pendataan_ps_cimanggis.tanggal_input', 'asc')
                    ->get();

        $users = auth()->user();
        $komoditas = KomoditasCimanggis::with('pendataanCimanggis')->get();

        return view('backend.admin.pendataanAll.showCimanggis', compact('pendataan','users'), ['title' => 'DETAIL KOMODITAS']);
    }

    public function showSemuaPasar(string $id)
    {
        $pendataan = DB::table('pendataan_harga_semua_pasars')
                    ->join('komoditas', 'pendataan_harga_semua_pasars.komoditas_id','komoditas.id')
                    ->join('pendataan_ps_cegers', 'pendataan_harga_semua_pasars.pendataan_ps_cegers_id','pendataan_ps_cegers.id')
                    ->join('pendataan_ps_serpongs', 'pendataan_harga_semua_pasars.pendataan_ps_serpongs_id','pendataan_ps_serpongs.id')
                    ->join('pendataan_ps_ciputats', 'pendataan_harga_semua_pasars.pendataan_ps_ciputats_id','pendataan_ps_ciputats.id')
                    ->join('pendataan_ps_cimanggis', 'pendataan_harga_semua_pasars.pendataan_ps_cimanggis_id','pendataan_ps_cimanggis.id')
                    ->join('pendataan_ps_jengkols', 'pendataan_harga_semua_pasars.pendataan_ps_jengkols_id','pendataan_ps_jengkols.id')
                    ->join('pendataan_ps_jombangs', 'pendataan_harga_semua_pasars.pendataan_ps_jombangs_id','pendataan_ps_jombangs.id')
                    ->where('pendataan_harga_semua_pasars.komoditas_id', $id)
                    ->select('pendataan_harga_semua_pasars.id as id_pendataan','komoditas.id as id_komoditas','pendataan_harga_semua_pasars.tanggal_input',
                    'komoditas.nama_komoditas as nama_komoditas','pendataan_ps_cegers.average_harga as rataRataCeger',
                    'pendataan_ps_serpongs.average_harga as rataRataSerpong','pendataan_ps_jombangs.average_harga as rataRataJombang',
                    'pendataan_ps_jengkols.average_harga as rataRataJengkol','pendataan_ps_ciputats.average_harga as rataRataCiputat',
                    'pendataan_ps_cimanggis.average_harga as rataRataCimanggis','pendataan_harga_semua_pasars.average_harga as rataRataSemuaPasar')
                    ->orderBy('pendataan_harga_semua_pasars.tanggal_input', 'asc')
                    ->get();

                    $users = auth()->user();


        return view('backend.admin.pendataanAll.showSemuaPasar', compact('pendataan','users'), ['title' => 'DETAIL KOMODITAS']);
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
    public function destroyCeger(string $id)
    {
        PendataanPsCeger::findOrFail($id)->delete();

        return redirect()->route('pendataanAll.indexCeger')->with('success', 'Data berhasil dihapus.');
    }

    public function destroyJombang(string $id)
    {
        PendataanPsJombang::findOrFail($id)->delete();

        return redirect()->route('pendataanAll.indexJombang')->with('success', 'Data berhasil dihapus.');
    }

    public function destroyCiputat(string $id)
    {
        PendataanPsCiputat::findOrFail($id)->delete();

        return redirect()->route('pendataanAll.indexCiputat')->with('success', 'Data berhasil dihapus.');
    }

    public function destroySerpong(string $id)
    {
        PendataanPsSerpong::findOrFail($id)->delete();

        return redirect()->route('pendataanAll.indexSerpong')->with('success', 'Data berhasil dihapus.');
    }

    public function destroyJengkol(string $id)
    {
        PendataanPsJengkol::findOrFail($id)->delete();

        return redirect()->route('pendataanAll.indexJengkol')->with('success', 'Data berhasil dihapus.');
    }

    public function destroyCimanggis(string $id)
    {
        PendataanPsCimanggis::findOrFail($id)->delete();

        return redirect()->route('pendataanAll.indexCimanggis')->with('success', 'Data berhasil dihapus.');
    }

    public function destroySemuaPasar(string $id)
    {
        PendataanHargaSemuaPasar::findOrFail($id)->delete();

        return redirect()->route('pendataanAll.indexSemuaPasar')->with('success', 'Data berhasil dihapus.');
    }
}
