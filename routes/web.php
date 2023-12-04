<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlasanKenaikanHargaCegerController;
use App\Http\Controllers\AlasanKenaikanHargaCimanggisController;
use App\Http\Controllers\AlasanKenaikanHargaCiputatController;
use App\Http\Controllers\AlasanKenaikanHargaJengkolController;
use App\Http\Controllers\AlasanKenaikanHargaJombangController;
use App\Http\Controllers\AlasanKenaikanHargaSerpongController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataSurveyorController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\DistributorsController;
use App\Http\Controllers\ExportAllController;
use App\Http\Controllers\ExportCegerController;
use App\Http\Controllers\ExportCimanggisController;
use App\Http\Controllers\ExportCiputatController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ExportJengkolController;
use App\Http\Controllers\ExportJombangController;
use App\Http\Controllers\ExportSerpongController;
use App\Http\Controllers\GabunganDataController;
use App\Http\Controllers\GrafikHargaAllController;
use App\Http\Controllers\GrafikHargaCegerController;
use App\Http\Controllers\GrafikHargaCimanggisController;
use App\Http\Controllers\GrafikHargaCiputatController;
use App\Http\Controllers\GrafikHargaController;
use App\Http\Controllers\GrafikHargaJengkolController;
use App\Http\Controllers\GrafikHargaJombangController;
use App\Http\Controllers\GrafikHargaSerpongController;
use App\Http\Controllers\GrafikPasarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImportAllController;
use App\Http\Controllers\ImportPasarController;
use App\Http\Controllers\ImportPsCegerController;
use App\Http\Controllers\ImportPsCimanggisController;
use App\Http\Controllers\ImportPsCiputatController;
use App\Http\Controllers\ImportPsJengkolController;
use App\Http\Controllers\ImportPsJombangController;
use App\Http\Controllers\ImportPsSerpongController;
use App\Http\Controllers\KapasController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KomoditasController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\Pagenotfound;
use App\Http\Controllers\PasarController;
use App\Http\Controllers\PedagangController;
use App\Http\Controllers\PendataanAllsController;
use App\Http\Controllers\PendataanController;
use App\Http\Controllers\PendataanPasarController;
use App\Http\Controllers\PendataanPsCegerController;
use App\Http\Controllers\PendataanPsCimanggisController;
use App\Http\Controllers\PendataanPsCiputatController;
use App\Http\Controllers\PendataanPsJengkolController;
use App\Http\Controllers\PendataanPsJombangController;
use App\Http\Controllers\PendataanPsSerpongController;
use App\Http\Controllers\PendataanStokCegerController;
use App\Http\Controllers\PendataanStokCimanggisController;
use App\Http\Controllers\PendataanStokCiputatController;
use App\Http\Controllers\PendataanStokJengkolController;
use App\Http\Controllers\PendataanStokJombangController;
use App\Http\Controllers\PendataanStokSerpongController;
use App\Http\Controllers\PengelolaController;
use App\Http\Controllers\ProfilPasarController;
use App\Http\Controllers\ProfilsPasarController;
use App\Http\Controllers\ReasonCegerController;
use App\Http\Controllers\ReasonCimanggisController;
use App\Http\Controllers\ReasonCiputatController;
use App\Http\Controllers\ReasonJengkolController;
use App\Http\Controllers\ReasonJombangController;
use App\Http\Controllers\ReasonSerpongController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\StafController;
use App\Http\Controllers\StafPsCegerController;
use App\Http\Controllers\StafPsCimanggisController;
use App\Http\Controllers\StafPsCiputatController;
use App\Http\Controllers\StafPsJengkolController;
use App\Http\Controllers\StafPsJombangController;
use App\Http\Controllers\StafPsSerpongController;
use App\Http\Controllers\SubkorController;
use App\Http\Controllers\SurveyorController;
use App\Http\Controllers\TabelHargaAllController;
use App\Http\Controllers\TabelHargaCegerController;
use App\Http\Controllers\TabelHargaCimanggisController;
use App\Http\Controllers\TabelHargaCiputatController;
use App\Http\Controllers\TabelHargaController;
use App\Http\Controllers\TabelHargaJengkolController;
use App\Http\Controllers\TabelHargaJombangController;
use App\Http\Controllers\TabelHargaSerpongController;
use App\Http\Controllers\TabelPasarController;
use App\Http\Controllers\TrenController;
use App\Http\Controllers\UnduhDataController;
use App\Http\Controllers\ValidatorController;
use App\Models\AlasanKenaikanHargaJombang;
use App\Models\PendataanPsCimanggis;
use App\Models\PendataanStokCeger;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

/* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */

Route::get('/home', function () {
    return redirect('/');
});

Route::match(['get', 'post'], '/', [HomeController::class, 'indexFrontend'])->name('home.indexFrontend');

Route::get('tabel-harga-komoditas', [TabelPasarController::class, 'indexHargaPerKomoditas'])->name('tabelpasar.indexHargaPerKomoditas');
Route::post('tabel-harga-komoditas', [TabelPasarController::class, 'indexHargaPerKomoditas'])->name('tabelpasar.indexHargaPerKomoditas');

Route::get('tabel-harga-pasar', [TabelPasarController::class, 'indexHargaPerPasar'])->name('tabelpasar.indexHargaPerPasar');
Route::post('tabel-harga-pasar', [TabelPasarController::class, 'indexHargaPerPasar'])->name('tabelpasar.indexHargaPerPasar');

Route::get('tabel-harga-6-pasar', [TabelPasarController::class, 'indexHarga6Pasar'])->name('tabelpasar.indexHarga6Pasar');
Route::post('tabel-harga-6-pasar', [TabelPasarController::class, 'indexHarga6Pasar'])->name('tabelpasar.indexHarga6Pasar');

Route::get('grafik-harga-komoditas', [GrafikPasarController::class, 'indexGrafikPerKomoditas'])->name('grafikPasar.indexGrafikPerKomoditas');
Route::post('grafik-harga-komoditas', [GrafikPasarController::class, 'indexGrafikPerKomoditas'])->name('grafikpasar.indexGrafikPerKomoditas');

Route::get('grafik-harga-pasars', [GrafikPasarController::class, 'indexGrafikPerPasarDanKomoditas'])->name('grafikPasar.indexGrafikPerPasarDanKomoditas');
Route::post('grafik-harga-pasars', [GrafikPasarController::class, 'indexGrafikPerPasarDanKomoditas'])->name('grafikpasar.indexGrafikPerPasarDanKomoditas');

Route::get('tren-harga-komoditas-perhari', [TrenController::class, 'indexHarian'])->name('Tren.indexHarian');
Route::post('tren-harga-komoditi-perhari', [TrenController::class, 'indexHarian'])->name('tren.indexHarian');

Route::get('tren-harga-komoditas-perbulan', [TrenController::class, 'indexBulan'])->name('Tren.indexBulan');
Route::post('tren-harga-komoditi-perbulan', [TrenController::class, 'indexBulan'])->name('tren.indexBulan');

Route::get('profils-pasars', [ProfilsPasarController::class, 'index'])->name('profils.index');
Route::get('profils-pasars/{id}', [ProfilsPasarController::class, 'show'])->name('profils.show');

Route::get('list-distributors', [DistributorsController::class, 'index'])->name('distributors.index');
Route::get('daftar-distributors/{id}', [DistributorsController::class, 'show'])->name('distributors.show');


/* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */

/* 1. Akses Semua Pasar */
Route::middleware(['auth', 'userAkses:1'])->group(function () {
    Route::get('dashboard-admin', [AdminController::class, 'dashboard'])->name('dashboardAdmin');

    /* Modul Role */
    Route::get('list-hak-akses', [RoleController::class, 'index'])->name('role.index');
    Route::get('tambah-hak-akses', [RoleController::class, 'create'])->name('role.create');
    Route::post('backend/admin/role', [RoleController::class, 'store'])->name('role.store');
    Route::get('edit-hak-akses', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('backend/admin/role/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::delete('backend/admin/role/{id}', [roleController::class, 'destroy'])->name('role.destroy');

    /* Modul kota */
    Route::get('list-kota', [KotaController::class, 'index'])->name('kota.index');
    Route::get('tambah-kota', [KotaController::class, 'create'])->name('kota.create');
    Route::post('backend/admin/kota', [KotaController::class, 'store'])->name('kota.store');
    Route::get('edit-kota/{id}', [KotaController::class, 'edit'])->name('kota.edit');
    Route::put('backend/admin/kota/{id}', [KotaController::class, 'update'])->name('kota.update');
    Route::delete('backend/admin/kota/{id}', [KotaController::class, 'destroy'])->name('kota.destroy');

    /* Modul Kecamatan */
    Route::get('list-kecamatan', [KecamatanController::class, 'index'])->name('kecamatan.index');
    Route::get('tambah-kecamatan', [KecamatanController::class, 'create'])->name('kecamatan.create');
    Route::post('backend/admin/kecamatan', [KecamatanController::class, 'store'])->name('kecamatan.store');
    Route::get('edit-kecamatan/{id}', [KecamatanController::class, 'edit'])->name('kecamatan.edit');
    Route::put('backend/admin/kecamatan/{id}', [KecamatanController::class, 'update'])->name('kecamatan.update');
    Route::delete('backend/admin/kecamatan/{id}', [KecamatanController::class, 'destroy'])->name('kecamatan.destroy');

    /* Modul Distributor */
    Route::get('list-distributor', [DistributorController::class, 'index'])->name('distributor.index');
    Route::get('tambah-distributor', [DistributorController::class, 'create'])->name('distributor.create');
    Route::get('daftar-distributor/{id}', [DistributorController::class, 'show'])->name('distributor.show');
    Route::post('backend/admin/distributor', [DistributorController::class, 'store'])->name('distributor.store');
    Route::get('edit-distributor/{id}', [DistributorController::class, 'edit'])->name('distributor.edit');
    Route::put('backend/admin/distributor/{id}', [DistributorController::class, 'update'])->name('distributor.update');
    Route::delete('backend/admin/distributor/{id}', [DistributorController::class, 'destroy'])->name('distributor.destroy');

    /* Modul Pasar */
    Route::get('list-pasar', [PasarController::class, 'index'])->name('pasar.index');
    Route::get('tambah-pasar', [PasarController::class, 'create'])->name('pasar.create');
    Route::post('backend/admin/pasar', [PasarController::class, 'store'])->name('pasar.store');
    Route::get('edit-pasar/{id}', [PasarController::class, 'edit'])->name('pasar.edit');
    Route::put('backend/admin/pasar/{id}', [PasarController::class, 'update'])->name('pasar.update');
    Route::delete('backend/admin/pasar/{id}', [PasarController::class, 'destroy'])->name('pasar.destroy');
    Route::get('/get-kecamatan/{id}', [PasarController::class, 'getKecamatan']);

    /* Modul Profil Pasar */
    Route::get('list-nama-pasar', [ProfilPasarController::class, 'index'])->name('profil.index');
    Route::get('tambah-profil-pasar', [ProfilPasarController::class, 'create'])->name('profil.create');
    Route::post('backend/admin/profil-pasar', [ProfilPasarController::class, 'store'])->name('profil.store');
    Route::get('profil-pasar/{id}', [ProfilPasarController::class, 'show'])->name('profil.show');
    Route::get('edit-profil-pasar/{id}', [ProfilPasarController::class, 'edit'])->name('profil.edit');
    Route::put('backend/admin/profil-pasar/{id}', [ProfilPasarController::class, 'update'])->name('profil.update');
    Route::delete('backend/admin/profil-pasar/{id}', [ProfilPasarController::class, 'destroy'])->name('profil.destroy');

    /* Modul Satuan */
    Route::get('list-satuan', [SatuanController::class, 'index'])->name('satuan.index');
    Route::get('tambah-satuan', [SatuanController::class, 'create'])->name('satuan.create');
    Route::post('backend/admin/satuan', [SatuanController::class, 'store'])->name('satuan.store');
    Route::get('edit-satuan/{id}', [SatuanController::class, 'edit'])->name('satuan.edit');
    Route::put('backend/admin/satuan/{id}', [SatuanController::class, 'update'])->name('satuan.update');
    Route::delete('backend/admin/satuan/{id}', [SatuanController::class, 'destroy'])->name('satuan.destroy');

    /* Modul Kategori */
    Route::get('list-kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('tambah-kategori', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('backend/admin/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('edit-kategori/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('backend/admin/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('backend/admin/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    /* Modul Komoditas */
    Route::get('list-komoditas', [KomoditasController::class, 'index'])->name('komoditas.index');
    Route::get('tambah-komoditas', [KomoditasController::class, 'create'])->name('komoditas.create');
    Route::post('backend/admin/komoditas', [KomoditasController::class, 'store'])->name('komoditas.store');
    Route::get('edit-komoditas/{id}', [KomoditasController::class, 'edit'])->name('komoditas.edit');
    Route::put('backend/admin/komoditas/{id}', [KomoditasController::class, 'update'])->name('komoditas.update');
    Route::delete('backend/admin/komoditas/{id}', [KomoditasController::class, 'destroy'])->name('komoditas.destroy');

    /* Modul Pedagang */
    Route::get('list-pedagang', [PedagangController::class, 'index'])->name('pedagang.index');
    Route::get('tambah-pedagang', [PedagangController::class, 'create'])->name('pedagang.create');
    Route::post('backend/admin/pedagang', [PedagangController::class, 'store'])->name('pedagang.store');
    Route::get('edit-pedagang/{id}', [PedagangController::class, 'edit'])->name('pedagang.edit')->name('pedagang.edit');
    Route::put('backend/admin/pedagang/{id}', [PedagangController::class, 'update'])->name('pedagang.update');
    Route::delete('backend/admin/pedagang/{id}', [PedagangController::class, 'destroy'])->name('pedagang.destroy');
    Route::get('/get-kecamatan/{id}', [PedagangController::class, 'getKecamatan']);
    Route::get('/get-pasar/{id}', [PedagangController::class, 'getPasar']);

    /* Modul Surveyor */
    Route::get('list-surveyor', [DataSurveyorController::class, 'index'])->name('datasurveyor.index');
    Route::get('tambah-surveyor', [DataSurveyorController::class, 'create'])->name('datasurveyor.create');
    Route::post('backend/admin/datasurveyor', [DataSurveyorController::class, 'store'])->name('datasurveyor.store');
    Route::get('edit-surveyor/{id}', [DataSurveyorController::class, 'edit'])->name('datasurveyor.edit');
    Route::put('backend/admin/datasurveyor/{id}', [DataSurveyorController::class, 'update'])->name('datasurveyor.update');
    Route::delete('backend/admin/datasurveyor/{id}', [DataSurveyorController::class, 'destroy'])->name('datasurveyor.destroy');
    Route::get('/get-kecamatan/{id}', [DataSurveyorController::class, 'getKecamatan']);
    Route::get('/get-pasar/{id}', [DataSurveyorController::class, 'getPasar']);

    /* Modul Tabel Harga */
    Route::get('tabel-harga-rata-rata-semua-pasar', [TabelHargaAllController::class, 'indexSemuaPasar'])->name('tabelharga.indexSemuaPasar');
    Route::get('tabel-harga-rata-rata-pasar-ceger', [TabelHargaAllController::class, 'indexCeger'])->name('tabelharga.indexCeger');
    Route::get('tabel-harga-rata-rata-pasar-ciputat', [TabelHargaAllController::class, 'indexCiputat'])->name('tabelharga.indexCiputat');
    Route::get('tabel-harga-rata-rata-pasar-jombang', [TabelHargaAllController::class, 'indexJombang'])->name('tabelharga.indexJombang');
    Route::get('tabel-harga-rata-rata-pasar-serpong', [TabelHargaAllController::class, 'indexSerpong'])->name('tabelharga.indexSerpong');
    Route::get('tabel-harga-rata-rata-pasar-cimanggis', [TabelHargaAllController::class, 'indexCimanggis'])->name('tabelharga.indexCimanggis');
    Route::get('tabel-harga-rata-rata-pasar-jengkol', [TabelHargaAllController::class, 'indexJengkol'])->name('tabelharga.indexJengkol');
    Route::get('backend/admin/tabel-harga/create', [TabelHargaAllController::class, 'create'])->name('tabelharga.create');
    Route::post('backend/admin/tabel-harga', [TabelHargaAllController::class, 'store'])->name('tabelharga.store');
    Route::get('backend/admin/tabel-harga/{id}/edit', [TabelHargaAllController::class, 'edit'])->name('tabelharga.edit');
    Route::put('backend/admin/tabel-harga/{id}', [TabelHargaAllController::class, 'update'])->name('tabelharga.update');
    Route::delete('backend/admin/tabel-harga/{id}', [TabelHargaAllController::class, 'destroy'])->name('tabelharga.destroy');

    /* Modul Pendataan */
    Route::get('input-harga-ps-ceger', [PendataanAllsController::class, 'indexCeger'])->name('pendataanAll.indexCeger');
    Route::get('input-harga-ps-ciputat', [PendataanAllsController::class, 'indexCiputat'])->name('pendataanAll.indexCiputat');
    Route::get('input-harga-ps-jombang', [PendataanAllsController::class, 'indexJombang'])->name('pendataanAll.indexJombang');
    Route::get('input-harga-ps-serpong', [PendataanAllsController::class, 'indexSerpong'])->name('pendataanAll.indexSerpong');
    Route::get('input-harga-ps-jengkol', [PendataanAllsController::class, 'indexJengkol'])->name('pendataanAll.indexJengkol');
    Route::get('input-harga-ps-cimanggis', [PendataanAllsController::class, 'indexCimanggis'])->name('pendataanAll.indexCimanggis');
    Route::get('input-harga-semua-pasar', [PendataanAllsController::class, 'indexSemuaPasar'])->name('pendataanAll.indexSemuaPasar');
    Route::get('resume-harga-semua-pasar', [PendataanAllsController::class, 'indexResumeHarga'])->name('pendataanAll.indexResumeHarga');
    Route::get('gabung-data-harga-pasar', [PendataanAllsController::class, 'indexGabungData'])->name('pendataanAll.indexGabungData');
    Route::get('history-harga-komoditas-semua-pasar/{id}', [PendataanAllsController::class, 'showSemuaPasar'])->name('pendataanAll.showSemuaPasar');
    Route::get('history-harga-komoditas-ps-ceger/{id}', [PendataanAllsController::class, 'showCeger'])->name('pendataanAll.showCeger');
    Route::get('history-harga-komoditas-ps-ciputat/{id}', [PendataanAllsController::class, 'showCiputat'])->name('pendataanAll.showCiputat');
    Route::get('history-harga-komoditas-ps-jombang/{id}', [PendataanAllsController::class, 'showJombang'])->name('pendataanAll.showJombang');
    Route::get('history-harga-komoditas-ps-serpong/{id}', [PendataanAllsController::class, 'showSerpong'])->name('pendataanAll.showSerpong');
    Route::get('history-harga-komoditas-ps-jengkol/{id}', [PendataanAllsController::class, 'showJengkol'])->name('pendataanAll.showJengkol');
    Route::get('history-harga-komoditas-ps-cimanggis/{id}', [PendataanAllsController::class, 'showCimanggis'])->name('pendataanAll.showCimanggis');
    Route::get('history-harga-komoditas-semua-pasar/{id}', [PendataanAllsController::class, 'showSemuaPasar'])->name('pendataanAll.showSemuaPasar');
    Route::get('backend/admin/pendataanAll/export/excel', [PendataanAllsController::class, 'exportPendataan'])->name('pendataanAll.exportPendataan');
    Route::get('backend/admin/pendataanAll/create/{pendataanId}', [PendataanAllsController::class, 'create'])->name('pendataanAll.create');
    Route::post('backend/admin/pendataanAll/{pendataanId}', [PendataanAllsController::class, 'storeSemuaPasar'])->name('pendataanAll.storeSemuaPasar');
    Route::post('backend/admin/pendataanCeger/{pendataanId}', [PendataanAllsController::class, 'storeCeger'])->name('pendataanAll.storeCeger');
    Route::post('backend/admin/pendataanCimanggis/{pendataanId}', [PendataanAllsController::class, 'storeCimanggis'])->name('pendataanAll.storeCimanggis');
    Route::post('backend/admin/pendataanCiputat/{pendataanId}', [PendataanAllsController::class, 'storeCiputat'])->name('pendataanAll.storeCiputat');
    Route::post('backend/admin/pendataanJengkol/{pendataanId}', [PendataanAllsController::class, 'storeJengkol'])->name('pendataanAll.storeJengkol');
    Route::post('backend/admin/pendataanJombang/{pendataanId}', [PendataanAllsController::class, 'storeJombang'])->name('pendataanAll.storeJombang');
    Route::post('backend/admin/pendataanSerpong/{pendataanId}', [PendataanAllsController::class, 'storeSerpong'])->name('pendataanAll.storeSerpong');
    Route::post('gabung-data', [PendataanAllsController::class, 'aggregateData'])->name('pendataanAll.aggregateData');
    Route::get('backend/admin/pendataanAll/{pendataan}/edit', [PendataanAllsController::class, 'edit'])->name('pendataanAll.edit');
    Route::put('backend/admin/pendataanAll/{pendataan}', [PendataanAllsController::class, 'update'])->name('pendataanAll.update');
    Route::delete('backend/admin/pendataanCeger/{pendataan}', [PendataanAllsController::class, 'destroyCeger'])->name('pendataanAll.destroyCeger');
    Route::delete('backend/admin/pendataanJombang/{pendataan}', [PendataanAllsController::class, 'destroyJombang'])->name('pendataanAll.destroyJombang');
    Route::delete('backend/admin/pendataanCiputat/{pendataan}', [PendataanAllsController::class, 'destroyCiputat'])->name('pendataanAll.destroyCiputat');
    Route::delete('backend/admin/pendataanSerpong/{pendataan}', [PendataanAllsController::class, 'destroySerpong'])->name('pendataanAll.destroySerpong');
    Route::delete('backend/admin/pendataanJengkol/{pendataan}', [PendataanAllsController::class, 'destroyJengkol'])->name('pendataanAll.destroyJengkol');
    Route::delete('backend/admin/pendataanCimanggis/{pendataan}', [PendataanAllsController::class, 'destroyCimanggis'])->name('pendataanAll.destroyCimanggis');
    Route::delete('backend/admin/pendataanSemuaPasar/{pendataan}', [PendataanAllsController::class, 'destroySemuaPasar'])->name('pendataanAll.destroySemuaPasar');
    Route::get('/get-surveyor-ceger/{id}', [ImportAllController::class, 'getSurveyorCeger']);
    Route::get('/get-surveyor-ciputat/{id}', [ImportAllController::class, 'getSurveyorCiputat']);
    Route::get('/get-surveyor-serpong/{id}', [ImportAllController::class, 'getSurveyorSerpong']);
    Route::get('/get-surveyor-jengkol/{id}', [ImportAllController::class, 'getSurveyorJengkol']);
    Route::get('/get-surveyor-cimanggis/{id}', [ImportAllController::class, 'getSurveyorCimanggis']);
    Route::get('/get-surveyor-jombang/{id}', [ImportAllController::class, 'getSurveyorJombang']);
    Route::get('/get-surveyor-semua-pasar/{id}', [ImportAllController::class, 'getSurveyorSemuaPasar']);

    Route::get('grafik-harga', [GrafikHargaAllController::class, 'index'])->name('grafik.index');
    Route::get('grafik-harga-30-Hari-erakhir', [GrafikHargaAllController::class, 'satubulan'])->name('grafik.satubulan');
    Route::get('backend/admin/grafik/{id}', [GrafikHargaAllController::class, 'tampil'])->name('grafik.tampil');

    Route::get('backend/admin/unduh/bydate', [UnduhDataController::class, 'bydate'])->name('bydate');
    Route::get('backend/admin/unduh/exportByDate', [UnduhDataController::class, 'exportByDate'])->name('exportByDate');
    Route::get('backend/admin/unduh/bydateandpasar', [UnduhDataController::class, 'bydateandpasar'])->name('bydateandpasar');

    Route::get('backend/admin/export/export-pendataan-form', [ExportController::class, 'exportForm'])->name('exportForm');
    Route::get('backend/admin/export/export-pendataan', [ExportController::class, 'exportPendataan'])->name('exportPendataan');
    Route::get('backend/admin/export/export-custom-pendataan', [ExportController::class, 'exportCustomPendataan'])->name('exportCustomPendataan');

    Route::get('backend/admin/export/export-pendataan-form-bydate', [ExportController::class, 'exportFormByDate'])->name('exportFormByDate');
    Route::get('backend/admin/export/export-custom-pendataan-bydate', [ExportController::class, 'exportCustomPendataanByDate'])->name('exportCustomPendataanByDate');

    /* Modul Pendataan Stok */
    Route::get('input-stok-ps-ceger', [PendataanStokCegerController::class, 'indexAdminCeger'])->name('pendataanStok.indexAdminCeger');
    Route::post('backend/admin/pendataanStokCeger/{pendataanId}', [PendataanStokCegerController::class, 'storeAdminCeger'])->name('pendataanStok.storeAdminCeger');
    Route::get('history-stok-komoditas-pasar-ceger/{id}', [PendataanStokCegerController::class, 'showAdminCeger'])->name('pendataanStok.showAdminCeger');
    Route::delete('backend/admin/pendataanStokCeger/{pendataan}', [PendataanStokCegerController::class, 'destroyAdminCeger'])->name('pendataanStok.destroyAdminCeger');

    Route::get('input-stok-ps-cimanggis', [PendataanStokCimanggisController::class, 'indexAdminCimanggis'])->name('pendataanStok.indexAdminCimanggis');
    Route::post('backend/admin/pendataanStokCimanggis/{pendataanId}', [PendataanStokCimanggisController::class, 'storeAdminCimanggis'])->name('pendataanStok.storeAdminCimanggis');
    Route::get('history-stok-komoditas-pasar-cimanggis/{id}', [PendataanStokCimanggisController::class, 'showAdminCimanggis'])->name('pendataanStok.showAdminCimanggis');
    Route::delete('backend/admin/pendataanStokCimanggis/{pendataan}', [PendataanStokCimanggisController::class, 'destroyAdminCimanggis'])->name('pendataanStok.destroyAdminCimanggis');

    Route::get('input-stok-ps-ciputat', [PendataanStokCiputatController::class, 'indexAdminCiputat'])->name('pendataanStok.indexAdminCiputat');
    Route::post('backend/admin/pendataanStokCiputat/{pendataanId}', [PendataanStokCiputatController::class, 'storeAdminCiputat'])->name('pendataanStok.storeAdminCiputat');
    Route::get('history-stok-komoditas-pasar-ciputat/{id}', [PendataanStokCiputatController::class, 'showAdminCiputat'])->name('pendataanStok.showAdminCiputat');
    Route::delete('backend/admin/pendataanStokCiputat/{pendataan}', [PendataanStokCiputatController::class, 'destroyAdminCiputat'])->name('pendataanStok.destroyAdminCiputat');

    Route::get('input-stok-ps-jengkol', [PendataanStokJengkolController::class, 'indexAdminJengkol'])->name('pendataanStok.indexAdminJengkol');
    Route::post('backend/admin/pendataanStokJengkol/{pendataanId}', [PendataanStokJengkolController::class, 'storeAdminJengkol'])->name('pendataanStok.storeAdminJengkol');
    Route::get('history-stok-komoditas-pasar-jengkol/{id}', [PendataanStokJengkolController::class, 'showAdminJengkol'])->name('pendataanStok.showAdminJengkol');
    Route::delete('backend/admin/pendataanStokJengkol/{pendataan}', [PendataanStokJengkolController::class, 'destroyAdminJengkol'])->name('pendataanStok.destroyAdminJengkol');

    Route::get('input-stok-ps-jombang', [PendataanStokJombangController::class, 'indexAdminJombang'])->name('pendataanStok.indexAdminJombang');
    Route::post('backend/admin/pendataanStokJombang/{pendataanId}', [PendataanStokJombangController::class, 'storeAdminJombang'])->name('pendataanStok.storeAdminJombang');
    Route::get('history-stok-komoditas-pasar-jombang/{id}', [PendataanStokJombangController::class, 'showAdminJombang'])->name('pendataanStok.showAdminJombang');
    Route::delete('backend/admin/pendataanStokJombang/{pendataan}', [PendataanStokJombangController::class, 'destroyAdminJombang'])->name('pendataanStok.destroyAdminJombang');

    Route::get('input-stok-ps-serpong', [PendataanStokSerpongController::class, 'indexAdminSerpong'])->name('pendataanStok.indexAdminSerpong');
    Route::post('backend/admin/pendataanStokSerpong/{pendataanId}', [PendataanStokSerpongController::class, 'storeAdminSerpong'])->name('pendataanStok.storeAdminSerpong');
    Route::get('history-stok-komoditas-pasar-serpong/{id}', [PendataanStokSerpongController::class, 'showAdminSerpong'])->name('pendataanStok.showAdminSerpong');
    Route::delete('backend/admin/pendataanStokSerpong/{pendataan}', [PendataanStokSerpongController::class, 'destroyAdminSerpong'])->name('pendataanStok.destroyAdminSerpong');

    /* Modul Export Form */
    Route::get('unduh-laporan', [ExportAllController::class, 'index'])->name('exportAll.index');
    Route::get('filter-pasar', [ExportAllController::class, 'filtered_data'])->name('exportAll.filtered_data');

    Route::get('form-laporan-harga-berdasarkan-tanggal', [ExportAllController::class, 'exportFormPilihTanggal'])->name('exportFormPilihTanggalAll');
    Route::get('backend/admin/export/laporan-harga-berdasarkan-tanggal', [ExportAllController::class, 'exportLaporanHargaPilihTanggal'])->name('exportLaporanHargaPilihTanggalAll');

    Route::get('backend/admin/export/laporan-harga-semua-pasar', [ExportAllController::class, 'exportLaporanHargaHarianAll'])->name('exportLaporanHargaHarianAll');

    Route::match(['get', 'post'], 'filter-by-pasar', [ExportAllController::class, 'filterByPasar'])->name('filterByPasar');

    Route::get('backend/admin/export/laporan-perubahan-harga-semua-pasar', [ExportAllController::class, 'exportLaporanPerubahanHargaAll'])->name('exportLaporanPerubahanHargaAll');

    /* Modul Import Form */
   Route::get('form-import-laporan-harga-ps-ceger', [ImportAllController::class, 'importFormPsCeger'])->name('importFormPsCeger');
   Route::post('backend/admin/import/import-data-ps-ceger', [ImportAllController::class, 'importDataPsCeger'])->name('importDataPsCeger');

   Route::get('form-import-laporan-harga-ps-ciputat', [ImportAllController::class, 'importFormPsCiputat'])->name('importFormPsCiputat');
   Route::post('backend/admin/import/import-data-ps-ciputat', [ImportAllController::class, 'importDataPsCiputat'])->name('importDataPsCiputat');

   Route::get('form-import-laporan-harga-ps-jombang', [ImportAllController::class, 'importFormPsJombang'])->name('importFormPsJombang');
   Route::post('backend/admin/import/import-data-ps-jombang', [ImportAllController::class, 'importDataPsJombang'])->name('importDataPsJombang');

   Route::get('form-import-laporan-harga-ps-serpong', [ImportAllController::class, 'importFormPsSerpong'])->name('importFormPsSerpong');
   Route::post('backend/admin/import/import-data-ps-serpong', [ImportAllController::class, 'importDataPsSerpong'])->name('importDataPsSerpong');

   Route::get('form-import-laporan-harga-ps-jengkol', [ImportAllController::class, 'importFormPsJengkol'])->name('importFormPsJengkol');
   Route::post('backend/admin/import/import-data-ps-jengkol', [ImportAllController::class, 'importDataPsJengkol'])->name('importDataPsJengkol');

   Route::get('form-import-laporan-harga-ps-cimanggis', [ImportAllController::class, 'importFormPsCimanggis'])->name('importFormPsCimanggis');
   Route::post('backend/admin/import/import-data-ps-cimanggis', [ImportAllController::class, 'importDataPsCimanggis'])->name('importDataPsCimanggis');

   Route::get('form-import-laporan-harga-semua-pasar', [ImportAllController::class, 'importFormAll'])->name('importFormAll');
   Route::post('backend/admin/import/import-data-semua-pasar', [ImportAllController::class, 'importDataAll'])->name('importDataAll');

    Route::post('backend/admin/logout', [AdminController::class, 'logout'])->name('logoutAll');
});

/* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */

/* 2. Akses Pasar Ciputat */
Route::middleware(['auth', 'userAkses:4'])->group(function () {
    Route::get('dashboard-pasar-ciputat', [StafPsCiputatController::class, 'dashboard'])->name('dashboardCiputat');

    /* Modul Pendataan */
    Route::get('input-harga-komoditas-pasar-ciputat', [PendataanPsCiputatController::class, 'index'])->name('pendataanPsCiputat.index');
    Route::get('backend/pasar_ciputat/pendataanPsCiputat/export/excel', [PendataanPsCiputatController::class, 'exportPendataan'])->name('pendataanPsCiputat.exportPendataan');
    Route::get('backend/pasar_ciputat/pendataanPsCiputat/create/{pendataanId}', [PendataanPsCiputatController::class, 'create'])->name('pendataanPsCiputat.create');
    Route::post('backend/pasar_ciputat/pendataanPsCiputat/{pendataanId}', [PendataanPsCiputatController::class, 'store'])->name('pendataanPsCiputat.store');
    Route::get('backend/pasar_ciputat/pendataanPsCiputat/{pendataan}/edit', [PendataanPsCiputatController::class, 'edit'])->name('pendataanPsCiputat.edit');
    Route::get('history-harga-komoditas-pasar-ciputat/{id}', [PendataanPsCiputatController::class, 'show'])->name('pendataanPsCiputat.show');
    Route::put('backend/pasar_ciputat/pendataanPsCiputat/{pendataan}', [PendataanPsCiputatController::class, 'update'])->name('pendataanPsCiputat.update');
    Route::delete('backend/pasar_ciputat/pendataanPsCiputat/{pendataan}', [PendataanPsCiputatController::class, 'destroy'])->name('pendataanPsCiputat.destroy');

    /* Modul Tabel Harga */
    Route::get('tabel-harga-komoditas-pasar-ciputat', [TabelHargaCiputatController::class, 'index'])->name('tabelhargaciputat.index');
    Route::get('backend/pasar_ciputat/tabelharga/create', [TabelHargaCiputatController::class, 'create'])->name('tabelhargaciputat.create');
    Route::post('backend/pasar_ciputat/tabelharga', [TabelHargaCiputatController::class, 'store'])->name('tabelhargaciputat.store');
    Route::get('backend/pasar_ciputat/tabelharga/{id}/edit', [TabelHargaCiputatController::class, 'edit'])->name('tabelhargaciputat.edit');
    Route::put('backend/pasar_ciputat/tabelharga/{id}', [TabelHargaCiputatController::class, 'update'])->name('tabelhargaciputat.update');
    Route::delete('backend/pasar_ciputat/tabelharga/{id}', [TabelHargaCiputatController::class, 'destroy'])->name('tabelhargaciputat.destroy');

    /* Modul Reason */
    Route::get('list-penyebab-kenaikan-harga-di-pasar-ciputat', [ReasonCiputatController::class, 'index'])->name('reasonCiputat.index');
    Route::get('tambah-penyebab-kenaikan-harga-di-pasar-ciputat', [ReasonCiputatController::class, 'create'])->name('reasonCiputat.create');
    Route::post('backend/pasar_ciputat/reasonCiputat', [ReasonCiputatController::class, 'store'])->name('reasonCiputat.store');
    Route::get('edit-penyebab-kenaikan-harga', [ReasonCiputatController::class, 'edit'])->name('reasonCiputat.edit');
    Route::put('backend/pasar_ciputat/reasonCiputat/{id}', [ReasonCiputatController::class, 'update'])->name('reasonCiputat.update');
    Route::delete('backend/pasar_ciputat/reasonCiputat/{id}', [ReasonCiputatController::class, 'destroy'])->name('reasonCiputat.destroy');

    /* Modul Input Penyebab Kenaikan Harga */
    Route::get('input-penyebab-kenaikan-harga-komoditas-di-pasar-ciputat', [AlasanKenaikanHargaCiputatController::class, 'index'])->name('alasanCiputat.index');
    Route::post('backend/pasar_ciputat/alasanKenaikanCiputat/{alasanId}', [AlasanKenaikanHargaCiputatController::class, 'store'])->name('alasanCiputat.store');

    Route::get('form-import-laporan-harga-pasar-ciputat', [ImportPsCiputatController::class, 'importFormCiputat'])->name('importFormCiputat');
    Route::post('backend/pasar_ciputat/import/import-data', [ImportPsCiputatController::class, 'importDataCiputat'])->name('importDataCiputat');

    Route::get('unduh-laporan-harga-pasar-ciputat', [ExportCiputatController::class, 'index'])->name('exportciputat.index');

    Route::get('unduh-laporan-harga-pasar-ciputat-berdasarkan-tanggal', [ExportCiputatController::class, 'exportFormLaporanPilihTanggalCiputat'])->name('exportFormLaporanPilihTanggalCiputat');
    Route::get('backend/pasar_ciputat/export/export-custom-pendataan-bybetweendate', [ExportCiputatController::class, 'exportLaporanHargaPilihTanggalCiputat'])->name('exportLaporanHargaPilihTanggalCiputat');

    Route::get('backend/pasar_ciputat/export/export-laporan-perubahan-harga-ciputat', [ExportCiputatController::class, 'exportLaporanPerubahanHargaCiputat'])->name('exportLaporanPerubahanHargaCiputat');
    Route::get('backend/pasar_ciputat/export/export-laporan-monitoring-pengawasan-inlfasi-ciputat', [ExportCiputatController::class, 'exportLaporanMonitoringPengawasanInflasiCiputat'])->name('exportLaporanMonitoringPengawasanInflasiCiputat');

    Route::get('backend/pasar_ciputat/export/export-laporan-harga-ciputat', [ExportCiputatController::class, 'exportLaporanHargaHarianCiputat'])->name('exportLaporanHargaHarianCiputat');

    Route::get('grafik-harga-pasar-ciputat', [GrafikHargaCiputatController::class, 'index'])->name('grafikciputat.index');
    Route::get('grafik-harga-pasar-ciputat/{id}', [GrafikHargaCiputatController::class, 'tampil'])->name('grafikciputat.tampil');

    Route::post('backend/pasar_ciputat/logout', [StafPsCiputatController::class, 'logout'])->name('logoutCiputat');
});

/* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */

/* 3. Akses Pasar Serpong */
Route::middleware(['auth', 'userAkses:7'])->group(function () {
    Route::get('dashboard-pasar-serpong', [StafPsSerpongController::class, 'dashboard'])->name('dashboardSerpong');

    /* Modul Pendataan */
    Route::get('input-harga-komoditas-pasar-serpong', [PendataanPsSerpongController::class, 'index'])->name('pendataanPsSerpong.index');
    Route::get('backend/pasar_serpong/pendataanPsSerpong/create/{pendataanId}', [PendataanPsSerpongController::class, 'create'])->name('pendataanPsSerpong.create');
    Route::post('backend/pasar_serpong/pendataanPsSerpong/{pendataanId}', [PendataanPsSerpongController::class, 'store'])->name('pendataanPsSerpong.store');
    Route::get('backend/pasar_serpong/pendataanPsSerpong/{pendataan}/edit', [PendataanPsSerpongController::class, 'edit'])->name('pendataanPsSerpong.edit');
    Route::get('history-harga-komoditas-pasar-serpong/{id}', [PendataanPsSerpongController::class, 'show'])->name('pendataanPsSerpong.show');
    Route::put('backend/pasar_serpong/pendataanPsSerpong/{pendataan}', [PendataanPsSerpongController::class, 'update'])->name('pendataanPsSerpong.update');
    Route::delete('backend/pasar_serpong/pendataanPsSerpong/{pendataan}', [PendataanPsSerpongController::class, 'destroy'])->name('pendataanPsSerpong.destroy');
    Route::get('/get-surveyor/{id}', [ImportPasarController::class, 'getSurveyor']);

    /* Modul Tabel Harga */
    Route::get('tabel-harga-komoditas-pasar-serpong', [TabelHargaSerpongController::class, 'index'])->name('tabelhargaserpong.index');
    Route::get('backend/pasar_serpong/tabelharga/create', [TabelHargaSerpongController::class, 'create'])->name('tabelhargaserpong.create');
    Route::post('backend/pasar_serpong/tabelharga', [TabelHargaSerpongController::class, 'store'])->name('tabelhargaserpong.store');
    Route::get('backend/pasar_serpong/tabelharga/{id}/edit', [TabelHargaSerpongController::class, 'edit'])->name('tabelhargaserpong.edit');
    Route::put('backend/pasar_serpong/tabelharga/{id}', [TabelHargaSerpongController::class, 'update'])->name('tabelhargaserpong.update');
    Route::delete('backend/pasar_serpong/tabelharga/{id}', [TabelHargaSerpongController::class, 'destroy'])->name('tabelhargaserpong.destroy');

    /* Modul Reason */
    Route::get('list-penyebab-kenaikan-harga-di-pasar-serpong', [ReasonSerpongController::class, 'index'])->name('reasonSerpong.index');
    Route::get('tambah-penyebab-kenaikan-harga', [ReasonSerpongController::class, 'create'])->name('reasonSerpong.create');
    Route::post('backend/admin/reason', [ReasonSerpongController::class, 'store'])->name('reasonSerpong.store');
    Route::get('edit-penyebab-kenaikan-harga', [ReasonSerpongController::class, 'edit'])->name('reasonSerpong.edit');
    Route::put('backend/admin/reason/{id}', [ReasonSerpongController::class, 'update'])->name('reasonSerpong.update');
    Route::delete('backend/admin/reason/{id}', [ReasonSerpongController::class, 'destroy'])->name('reasonSerpong.destroy');

    /* Modul Input Penyebab Kenaikan Harga */
    Route::get('input-penyebab-kenaikan-harga-komoditas-di-pasar-serpong', [AlasanKenaikanHargaSerpongController::class, 'index'])->name('alasanSerpong.index');
    Route::post('backend/pasar_serpong/alasanKenaikan/{alasanId}', [AlasanKenaikanHargaSerpongController::class, 'store'])->name('alasanSerpong.store');

    /* Modul Grafik Harga */
    Route::get('grafik-harga-pasar-serpong', [GrafikHargaSerpongController::class, 'index'])->name('grafikserpong.index');
    Route::get('grafik-harga-pasar-serpong/{id}', [GrafikHargaSerpongController::class, 'tampil'])->name('grafikserpong.tampil');

    /* Modul Export Laporan */
    Route::get('unduh-laporan-harga-pasar-serpong', [ExportSerpongController::class, 'index'])->name('exportserpong.index');
    Route::get('backend/pasar_serpong/export/export-laporan-perubahan-harga-serpong', [ExportSerpongController::class, 'exportLaporanPerubahanHargaSerpong'])->name('exportLaporanPerubahanHargaSerpong');
    Route::get('backend/pasar_serpong/export/export-laporan-monitoring-pengawasan-inlfasi-serpong', [ExportSerpongController::class, 'exportLaporanMonitoringPengawasanInflasiSerpong'])->name('exportLaporanMonitoringPengawasanInflasiSerpong');
    Route::get('backend/pasar_serpong/export/export-laporan-harga-serpong', [ExportSerpongController::class, 'exportLaporanHargaHarianSerpong'])->name('exportLaporanHargaHarianSerpong');
    Route::get('unduh-laporan-harga-pasar-serpong-berdasarkan-tanggal', [ExportSerpongController::class, 'exportFormLaporanPilihTanggalSerpong'])->name('exportFormLaporanPilihTanggalSerpong');
    Route::get('backend/pasar_serpong/export/export-custom-pendataan-bybetweendate', [ExportSerpongController::class, 'exportLaporanHargaPilihTanggalSerpong'])->name('exportLaporanHargaPilihTanggalSerpong');

     /* Modul Import Laporan */
    Route::get('form-import-laporan-harga-pasar-serpong', [ImportPsSerpongController::class, 'importFormSerpong'])->name('importFormSerpong');
    Route::post('backend/pasar_serpong/import/import-data', [ImportPsSerpongController::class, 'importDataSerpong'])->name('importDataSerpong');

    /* Modul Logout */
    Route::post('backend/pasar_serpong/logout', [StafPsSerpongController::class, 'logout'])->name('logoutSerpong');
});

/* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */

/* 4. Akses Pasar Ceger */
Route::middleware(['auth', 'userAkses:2'])->group(function () {
    Route::get('dashboard-pasar-ceger', [StafPsCegerController::class, 'dashboard'])->name('dashboardCeger');

    /* Modul Pendataan */
    Route::get('input-harga-komoditas-pasar-ceger', [PendataanPsCegerController::class, 'index'])->name('pendataanPsCeger.index');
    Route::get('backend/pasar_ceger/pendataanPsCeger/create/{pendataanId}', [PendataanPsCegerController::class, 'create'])->name('pendataanPsCeger.create');
    Route::post('backend/pasar_ceger/pendataanPsCeger/{pendataanId}', [PendataanPsCegerController::class, 'store'])->name('pendataanPsCeger.store');
    Route::get('backend/pasar_ceger/pendataanPsCeger/{pendataan}/edit', [PendataanPsCegerController::class, 'edit'])->name('pendataanPsCeger.edit');
    Route::get('history-harga-komoditas-pasar-ceger/{id}', [PendataanPsCegerController::class, 'show'])->name('pendataanPsCeger.show');
    Route::put('backend/pasar_ceger/pendataanPsCeger/{pendataan}', [PendataanPsCegerController::class, 'update'])->name('pendataanPsCeger.update');
    Route::delete('backend/pasar_ceger/pendataanPsCeger/{pendataan}', [PendataanPsCegerController::class, 'destroy'])->name('pendataanPsCeger.destroy');

    /* Modul Tabel Harga */
    Route::get('tabel-harga-komoditas-pasar-ceger', [TabelHargaCegerController::class, 'index'])->name('tabelhargaceger.index');
    Route::get('backend/pasar_ceger/tabelharga/create', [TabelHargaCegerController::class, 'create'])->name('tabelhargaceger.create');
    Route::post('backend/pasar_ceger/tabelharga', [TabelHargaCegerController::class, 'store'])->name('tabelhargaceger.store');
    Route::get('backend/pasar_ceger/tabelharga/{id}/edit', [TabelHargaCegerController::class, 'edit'])->name('tabelhargaceger.edit');
    Route::put('backend/pasar_ceger/tabelharga/{id}', [TabelHargaCegerController::class, 'update'])->name('tabelhargaceger.update');
    Route::delete('backend/pasar_ceger/tabelharga/{id}', [TabelHargaCegerController::class, 'destroy'])->name('tabelhargaceger.destroy');

    /* Modul Reason */
    Route::get('list-penyebab-kenaikan-harga-di-pasar-ceger', [ReasonCegerController::class, 'index'])->name('reasonCeger.index');
    Route::get('tambah-penyebab-kenaikan-harga-di-pasar-ceger', [ReasonCegerController::class, 'create'])->name('reasonCeger.create');
    Route::post('backend/pasar_ceger/reasonCeger', [ReasonCegerController::class, 'store'])->name('reasonCeger.store');
    Route::get('edit-penyebab-kenaikan-harga', [ReasonCegerController::class, 'edit'])->name('reasonCeger.edit');
    Route::put('backend/pasar_ceger/reasonCeger/{id}', [ReasonCegerController::class, 'update'])->name('reasonCeger.update');
    Route::delete('backend/pasar_ceger/reasonCeger/{id}', [ReasonCegerController::class, 'destroy'])->name('reasonCeger.destroy');

    /* Modul Input Penyebab Kenaikan Harga */
    Route::get('input-penyebab-kenaikan-harga-komoditas-di-pasar-ceger', [AlasanKenaikanHargaCegerController::class, 'index'])->name('alasanCeger.index');
    Route::post('backend/pasar_ceger/alasanKenaikanCeger/{alasanId}', [AlasanKenaikanHargaCegerController::class, 'store'])->name('alasanCeger.store');

    /* Modul Grafik Harga */
    Route::get('grafik-harga-pasar-ceger', [GrafikHargaCegerController::class, 'index'])->name('grafikceger.index');
    Route::get('grafik-harga-pasar-ceger/{id}', [GrafikHargaCegerController::class, 'tampil'])->name('grafikceger.tampil');

    /* Modul Export Laporan */
    Route::get('unduh-laporan-harga-pasar-ceger', [ExportCegerController::class, 'index'])->name('exportceger.index');
    Route::get('backend/pasar_ceger/export/export-laporan-perubahan-harga-ceger', [ExportCegerController::class, 'exportLaporanPerubahanHargaCeger'])->name('exportLaporanPerubahanHargaCeger');
    Route::get('backend/pasar_ceger/export/export-laporan-monitoring-pengawasan-inlfasi-ceger', [ExportCegerController::class, 'exportLaporanMonitoringPengawasanInflasiCeger'])->name('exportLaporanMonitoringPengawasanInflasiCeger');
    Route::get('backend/pasar_ceger/export/export-laporan-harga-ceger', [ExportCegerController::class, 'exportLaporanHargaHarianCeger'])->name('exportLaporanHargaHarianCeger');
    Route::get('unduh-laporan-harga-pasar-ceger-berdasarkan-tanggal', [ExportCegerController::class, 'exportFormLaporanPilihTanggalCeger'])->name('exportFormLaporanPilihTanggalCeger');
    Route::get('backend/pasar_ceger/export/export-custom-pendataan-bybetweendate', [ExportCegerController::class, 'exportLaporanHargaPilihTanggalCeger'])->name('exportLaporanHargaPilihTanggalCeger');

     /* Modul Import Laporan */
    Route::get('form-import-laporan-harga-pasar-ceger', [ImportPsCegerController::class, 'importFormCeger'])->name('importFormCeger');
    Route::post('backend/pasar_ceger/import/import-data', [ImportPsCegerController::class, 'importDataCeger'])->name('importDataCeger');

    /* Modul Logout */
    Route::post('backend/pasar_ceger/logout', [StafPsCegerController::class, 'logout'])->name('logoutCeger');
});

/* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */

/* 5. Akses Pasar Jengkol */
Route::middleware(['auth', 'userAkses:5'])->group(function () {
    Route::get('dashboard-pasar-jengkol', [StafPsJengkolController::class, 'dashboard'])->name('dashboardJengkol');

    /* Modul Pendataan */
    Route::get('input-harga-komoditas-pasar-jengkol', [PendataanPsJengkolController::class, 'index'])->name('pendataanPsJengkol.index');
    Route::get('backend/pasar_jengkol/pendataanPsJengkol/create/{pendataanId}', [PendataanPsJengkolController::class, 'create'])->name('pendataanPsJengkol.create');
    Route::post('backend/pasar_jengkol/pendataanPsJengkol/{pendataanId}', [PendataanPsJengkolController::class, 'store'])->name('pendataanPsJengkol.store');
    Route::get('backend/pasar_jengkol/pendataanPsJengkol/{pendataan}/edit', [PendataanPsJengkolController::class, 'edit'])->name('pendataanPsJengkol.edit');
    Route::get('history-harga-komoditas-pasar-jengkol/{id}', [PendataanPsJengkolController::class, 'show'])->name('pendataanPsJengkol.show');
    Route::put('backend/pasar_jengkol/pendataanPsJengkol/{pendataan}', [PendataanPsJengkolController::class, 'update'])->name('pendataanPsJengkol.update');
    Route::delete('backend/pasar_jengkol/pendataanPsJengkol/{pendataan}', [PendataanPsJengkolController::class, 'destroy'])->name('pendataanPsJengkol.destroy');

    /* Modul Tabel Harga */
    Route::get('tabel-harga-komoditas-pasar-jengkol', [TabelHargaJengkolController::class, 'index'])->name('tabelhargaJengkol.index');
    Route::get('backend/pasar_jengkol/tabelharga/create', [TabelHargaJengkolController::class, 'create'])->name('tabelhargaJengkol.create');
    Route::post('backend/pasar_jengkol/tabelharga', [TabelHargaJengkolController::class, 'store'])->name('tabelhargaJengkol.store');
    Route::get('backend/pasar_jengkol/tabelharga/{id}/edit', [TabelHargaJengkolController::class, 'edit'])->name('tabelhargaJengkol.edit');
    Route::put('backend/pasar_jengkol/tabelharga/{id}', [TabelHargaJengkolController::class, 'update'])->name('tabelhargaJengkol.update');
    Route::delete('backend/pasar_jengkol/tabelharga/{id}', [TabelHargaJengkolController::class, 'destroy'])->name('tabelhargaJengkol.destroy');

    /* Modul Reason */
    Route::get('list-penyebab-kenaikan-harga-di-pasar-jengkol', [ReasonJengkolController::class, 'index'])->name('reasonJengkol.index');
    Route::get('tambah-penyebab-kenaikan-harga-di-pasar-jengkol', [ReasonJengkolController::class, 'create'])->name('reasonJengkol.create');
    Route::post('backend/pasar_jengkol/reasonJengkol', [ReasonJengkolController::class, 'store'])->name('reasonJengkol.store');
    Route::get('edit-penyebab-kenaikan-harga', [ReasonJengkolController::class, 'edit'])->name('reasonJengkol.edit');
    Route::put('backend/pasar_jengkol/reasonJengkol/{id}', [ReasonJengkolController::class, 'update'])->name('reasonJengkol.update');
    Route::delete('backend/pasar_jengkol/reasonJengkol/{id}', [ReasonJengkolController::class, 'destroy'])->name('reasonJengkol.destroy');

    /* Modul Input Penyebab Kenaikan Harga */
    Route::get('input-penyebab-kenaikan-harga-komoditas-di-pasar-Jengkol', [AlasanKenaikanHargaJengkolController::class, 'index'])->name('alasanJengkol.index');
    Route::post('backend/pasar_Jengkol/alasanKenaikanJengkol/{alasanId}', [AlasanKenaikanHargaJengkolController::class, 'store'])->name('alasanJengkol.store');

    /* Modul Grafik Harga */
    Route::get('grafik-harga-pasar-jengkol', [GrafikHargaJengkolController::class, 'index'])->name('grafikJengkol.index');
    Route::get('grafik-harga-pasar-jengkol/{id}', [GrafikHargaJengkolController::class, 'tampil'])->name('grafikJengkol.tampil');

    /* Modul Export Laporan */
    Route::get('unduh-laporan-harga-pasar-jengkol', [ExportJengkolController::class, 'index'])->name('exportJengkol.index');
    Route::get('backend/pasar_jengkol/export/export-laporan-perubahan-harga-jengkol', [ExportJengkolController::class, 'exportLaporanPerubahanHargaJengkol'])->name('exportLaporanPerubahanHargaJengkol');
    Route::get('backend/pasar_jengkol/export/export-laporan-monitoring-pengawasan-inlfasi-jengkol', [ExportJengkolController::class, 'exportLaporanMonitoringPengawasanInflasiJengkol'])->name('exportLaporanMonitoringPengawasanInflasiJengkol');
    Route::get('backend/pasar_jengkol/export/export-laporan-harga-Jengkol', [ExportJengkolController::class, 'exportLaporanHargaHarianJengkol'])->name('exportLaporanHargaHarianJengkol');
    Route::get('unduh-laporan-harga-pasar-jengkol-berdasarkan-tanggal', [ExportJengkolController::class, 'exportFormLaporanPilihTanggalJengkol'])->name('exportFormLaporanPilihTanggalJengkol');
    Route::get('backend/pasar_jengkol/export/export-custom-pendataan-bybetweendate', [ExportJengkolController::class, 'exportLaporanHargaPilihTanggalJengkol'])->name('exportLaporanHargaPilihTanggalJengkol');

     /* Modul Import Laporan */
    Route::get('form-import-laporan-harga-pasar-jengkol', [ImportPsJengkolController::class, 'importFormJengkol'])->name('importFormJengkol');
    Route::post('backend/pasar_jengkol/import/import-data', [ImportPsJengkolController::class, 'importDataJengkol'])->name('importDataJengkol');

    /* Modul Logout */
    Route::post('backend/pasar_jengkol/logout', [StafPsJengkolController::class, 'logout'])->name('logoutJengkol');
});

/* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */

/* 5. Akses Pasar Cimanggis */
Route::middleware(['auth', 'userAkses:3'])->group(function () {
    Route::get('dashboard-pasar-cimanggis', [StafPsCimanggisController::class, 'dashboard'])->name('dashboardCimanggis');

    /* Modul Pendataan */
    Route::get('input-harga-komoditas-pasar-cimanggis', [PendataanPsCimanggisController::class, 'index'])->name('pendataanPsCimanggis.index');
    Route::get('backend/pasar_cimanggis/pendataanPsCimanggis/create/{pendataanId}', [PendataanPsCimanggisController::class, 'create'])->name('pendataanPsCimanggis.create');
    Route::post('backend/pasar_cimanggis/pendataanPsCimanggis/{pendataanId}', [PendataanPsCimanggisController::class, 'store'])->name('pendataanPsCimanggis.store');
    Route::get('backend/pasar_cimanggis/pendataanPsCimanggis/{pendataan}/edit', [PendataanPsCimanggisController::class, 'edit'])->name('pendataanPsCimanggis.edit');
    Route::get('history-harga-komoditas-pasar-Cimanggis/{id}', [PendataanPsCimanggisController::class, 'show'])->name('pendataanPsCimanggis.show');
    Route::put('backend/pasar_cimanggis/pendataanPsCimanggis/{pendataan}', [PendataanPsCimanggisController::class, 'update'])->name('pendataanPsCimanggis.update');
    Route::delete('backend/pasar_cimanggis/pendataanPsCimanggis/{pendataan}', [PendataanPsCimanggisController::class, 'destroy'])->name('pendataanPsCimanggis.destroy');

    /* Modul Tabel Harga */
    Route::get('tabel-harga-komoditas-pasar-cimanggis', [TabelHargaCimanggisController::class, 'index'])->name('tabelhargaCimanggis.index');
    Route::get('backend/pasar_cimanggis/tabelharga/create', [TabelHargaCimanggisController::class, 'create'])->name('tabelhargaCimanggis.create');
    Route::post('backend/pasar_cimanggis/tabelharga', [TabelHargaCimanggisController::class, 'store'])->name('tabelhargaCimanggis.store');
    Route::get('backend/pasar_cimanggis/tabelharga/{id}/edit', [TabelHargaCimanggisController::class, 'edit'])->name('tabelhargaCimanggis.edit');
    Route::put('backend/pasar_cimanggis/tabelharga/{id}', [TabelHargaCimanggisController::class, 'update'])->name('tabelhargaCimanggis.update');
    Route::delete('backend/pasar_cimanggis/tabelharga/{id}', [TabelHargaCimanggisController::class, 'destroy'])->name('tabelhargaCimanggis.destroy');

    /* Modul Reason */
    Route::get('list-penyebab-kenaikan-harga-di-pasar-cimanggis', [ReasonCimanggisController::class, 'index'])->name('reasonCimanggis.index');
    Route::get('tambah-penyebab-kenaikan-harga-di-pasar-cimanggis', [ReasonCimanggisController::class, 'create'])->name('reasonCimanggis.create');
    Route::post('backend/pasar_cimanggis/reasonCimanggis', [ReasonCimanggisController::class, 'store'])->name('reasonCimanggis.store');
    Route::get('edit-penyebab-kenaikan-harga', [ReasonCimanggisController::class, 'edit'])->name('reasonCimanggis.edit');
    Route::put('backend/pasar_cimanggis/reasonCimanggis/{id}', [ReasonCimanggisController::class, 'update'])->name('reasonCimanggis.update');
    Route::delete('backend/pasar_cimanggis/reasonCimanggis/{id}', [ReasonCimanggisController::class, 'destroy'])->name('reasonCimanggis.destroy');

    /* Modul Input Penyebab Kenaikan Harga */
    Route::get('input-penyebab-kenaikan-harga-komoditas-di-pasar-cimanggis', [AlasanKenaikanHargaCimanggisController::class, 'index'])->name('alasanCimanggis.index');
    Route::post('backend/pasar_cimanggis/alasanKenaikanCimanggis/{alasanId}', [AlasanKenaikanHargaCimanggisController::class, 'store'])->name('alasanCimanggis.store');

    /* Modul Grafik Harga */
    Route::get('grafik-harga-pasar-cimanggis', [GrafikHargaCimanggisController::class, 'index'])->name('grafikCimanggis.index');
    Route::get('grafik-harga-pasar-cimanggis/{id}', [GrafikHargaCimanggisController::class, 'tampil'])->name('grafikCimanggis.tampil');

    /* Modul Export Laporan */
    Route::get('unduh-laporan-harga-pasar-cimanggis', [ExportCimanggisController::class, 'index'])->name('exportCimanggis.index');
    Route::get('backend/pasar_cimanggis/export/export-laporan-perubahan-harga-cimanggis', [ExportCimanggisController::class, 'exportLaporanPerubahanHargaCimanggis'])->name('exportLaporanPerubahanHargaCimanggis');
    Route::get('backend/pasar_cimanggis/export/export-laporan-monitoring-pengawasan-inlfasi-cimanggis', [ExportCimanggisController::class, 'exportLaporanMonitoringPengawasanInflasiCimanggis'])->name('exportLaporanMonitoringPengawasanInflasiCimanggis');
    Route::get('backend/pasar_cimanggis/export/export-laporan-harga-Cimanggis', [ExportCimanggisController::class, 'exportLaporanHargaHarianCimanggis'])->name('exportLaporanHargaHarianCimanggis');
    Route::get('unduh-laporan-harga-pasar-cimanggis-berdasarkan-tanggal', [ExportCimanggisController::class, 'exportFormLaporanPilihTanggalCimanggis'])->name('exportFormLaporanPilihTanggalCimanggis');
    Route::get('backend/pasar_cimanggis/export/export-custom-pendataan-bybetweendate', [ExportCimanggisController::class, 'exportLaporanHargaPilihTanggalCimanggis'])->name('exportLaporanHargaPilihTanggalCimanggis');

     /* Modul Import Laporan */
    Route::get('form-import-laporan-harga-pasar-cimanggis', [ImportPsCimanggisController::class, 'importFormCimanggis'])->name('importFormCimanggis');
    Route::post('backend/pasar_cimanggis/import/import-data', [ImportPsCimanggisController::class, 'importDataCimanggis'])->name('importDataCimanggis');

    /* Modul Logout */
    Route::post('backend/pasar_cimanggis/logout', [StafPsCimanggisController::class, 'logout'])->name('logoutCimanggis');
});

/* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */

/* 6. Akses Pasar Jombang */
Route::middleware(['auth', 'userAkses:6'])->group(function () {
    Route::get('dashboard-pasar-jombang', [StafPsJombangController::class, 'dashboard'])->name('dashboardJombang');

    /* Modul Reason */
    Route::get('list-penyebab-kenaikan-harga-di-pasar-jombang', [ReasonJombangController::class, 'index'])->name('reasonJombang.index');
    Route::get('tambah-penyebab-kenaikan-harga-di-pasar-jombang', [ReasonJombangController::class, 'create'])->name('reasonJombang.create');
    Route::post('backend/pasar_jombang/reason', [ReasonJombangController::class, 'store'])->name('reasonJombang.store');
    Route::get('edit-penyebab-kenaikan-harga', [ReasonJombangController::class, 'edit'])->name('reasonJombang.edit');
    Route::put('backend/pasar_jombang/reason/{id}', [ReasonJombangController::class, 'update'])->name('reasonJombang.update');
    Route::delete('backend/pasar_jombang/reason/{id}', [ReasonJombangController::class, 'destroy'])->name('reasonJombang.destroy');

    /* Modul Pendataan */
    Route::get('input-harga-komoditas-pasar-jombang', [PendataanPsJombangController::class, 'index'])->name('pendataanPsJombang.index');
    Route::get('backend/pasar_jombang/pendataanPsJombang/create/{pendataanId}', [PendataanPsJombangController::class, 'create'])->name('pendataanPsJombang.create');
    Route::post('backend/pasar_jombang/pendataanPsJombang/{pendataanId}', [PendataanPsJombangController::class, 'store'])->name('pendataanPsJombang.store');
    Route::get('backend/pasar_jombang/pendataanPsJombang/{pendataan}/edit', [PendataanPsJombangController::class, 'edit'])->name('pendataanPsJombang.edit');
    Route::get('history-harga-komoditas-pasar-Jombang/{id}', [PendataanPsJombangController::class, 'show'])->name('pendataanPsJombang.show');
    Route::put('backend/pasar_jombang/pendataanPsJombang/{pendataan}', [PendataanPsJombangController::class, 'update'])->name('pendataanPsJombang.update');
    Route::delete('backend/pasar_jombang/pendataanPsJombang/{pendataan}', [PendataanPsJombangController::class, 'destroy'])->name('pendataanPsJombang.destroy');

    /* Modul Input Penyebab Kenaikan Harga */
    Route::get('input-penyebab-kenaikan-harga-komoditas-di-pasar-jombang', [AlasanKenaikanHargaJombangController::class, 'index'])->name('alasanJombang.index');
    Route::post('backend/pasar_jombang/alasanKenaikanJombang/{alasanId}', [AlasanKenaikanHargaJombangController::class, 'store'])->name('alasanJombang.store');

    /* Modul Tabel Harga */
    Route::get('tabel-harga-komoditas-pasar-jombang', [TabelHargaJombangController::class, 'index'])->name('tabelhargaJombang.index');
    Route::get('backend/pasar_jombang/tabelharga/create', [TabelHargaJombangController::class, 'create'])->name('tabelhargaJombang.create');
    Route::post('backend/pasar_jombang/tabelharga', [TabelHargaJombangController::class, 'store'])->name('tabelhargaJombang.store');
    Route::get('backend/pasar_jombang/tabelharga/{id}/edit', [TabelHargaJombangController::class, 'edit'])->name('tabelhargaJombang.edit');
    Route::put('backend/pasar_jombang/tabelharga/{id}', [TabelHargaJombangController::class, 'update'])->name('tabelhargaJombang.update');
    Route::delete('backend/pasar_jombang/tabelharga/{id}', [TabelHargaJombangController::class, 'destroy'])->name('tabelhargaJombang.destroy');

    /* Modul Grafik Harga */
    Route::get('grafik-harga-pasar-jombang', [GrafikHargaJombangController::class, 'index'])->name('grafikJombang.index');
    Route::get('grafik-harga-pasar-jombang/{id}', [GrafikHargaJombangController::class, 'tampil'])->name('grafikJombang.tampil');

    /* Modul Export Laporan */
    Route::get('unduh-laporan-harga-pasar-jombang', [ExportJombangController::class, 'index'])->name('exportJombang.index');
    Route::get('backend/pasar_jombang/export/export-laporan-perubahan-harga-Jombang', [ExportJombangController::class, 'exportLaporanPerubahanHargaJombang'])->name('exportLaporanPerubahanHargaJombang');
    Route::get('backend/pasar_jombang/export/export-laporan-monitoring-pengawasan-inlfasi-Jombang', [ExportJombangController::class, 'exportLaporanMonitoringPengawasanInflasiJombang'])->name('exportLaporanMonitoringPengawasanInflasiJombang');
    Route::get('backend/pasar_jombang/export/export-laporan-harga-Jombang', [ExportJombangController::class, 'exportLaporanHargaHarianJombang'])->name('exportLaporanHargaHarianJombang');
    Route::get('unduh-laporan-harga-pasar-Jombang-berdasarkan-tanggal', [ExportJombangController::class, 'exportFormLaporanPilihTanggalJombang'])->name('exportFormLaporanPilihTanggalJombang');
    Route::get('backend/pasar_jombang/export/export-custom-pendataan-bybetweendate', [ExportJombangController::class, 'exportLaporanHargaPilihTanggalJombang'])->name('exportLaporanHargaPilihTanggalJombang');

     /* Modul Import Laporan */
    Route::get('form-import-laporan-harga-pasar-jombang', [ImportPsJombangController::class, 'importFormJombang'])->name('importFormJombang');
    Route::post('backend/pasar_jombang/import/import-data', [ImportPsJombangController::class, 'importDataJombang'])->name('importDataJombang');

    /* Modul Logout */
    Route::post('backend/pasar_jombang/logout', [StafPsJombangController::class, 'logout'])->name('logoutJombang');
});

/* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */

Route::middleware(['auth', 'userAkses:8'])->group(function () {
    Route::get('/kapas/dashboard', [KapasController::class, 'dashboard']);

    Route::post('/kapas/logout', [KapasController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'userAkses:9'])->group(function () {
    Route::get('/pengelola/dashboard', [PengelolaController::class, 'dashboard']);

    Route::post('/pengelola/logout', [PengelolaController::class, 'logout'])->name('logout');
});

Route::get('backend/pagenotfound', [Pagenotfound::class, 'index']);
