<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeKomoditiSemuaHarga extends Model
{
    use HasFactory;
    protected $table = 'komoditas';
    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function resumesemuahargapasar()
    {
        return $this->hasMany(ResumePendataanHargaPasar::class, 'komoditas_id');
    }

    public function pendataansemuapasar()
    {
        return $this->hasMany(PendataanHargaSemuaPasar::class, 'komoditas_id');
    }

    public function pendataanceger()
    {
        return $this->hasMany(PendataanPsCeger::class, 'komoditas_id');
    }

    public function pendataancimanggis()
    {
        return $this->hasMany(PendataanPsCimanggis::class, 'komoditas_id');
    }

    public function pendataanciputat()
    {
        return $this->hasMany(PendataanPsCiputat::class, 'komoditas_id');
    }

    public function pendataanjengkol()
    {
        return $this->hasMany(PendataanPsJengkol::class, 'komoditas_id');
    }

    public function pendataanjombang()
    {
        return $this->hasMany(PendataanPsJombang::class, 'komoditas_id');
    }

    public function pendataanserpong()
    {
        return $this->hasMany(PendataanPsSerpong::class, 'komoditas_id');
    }

    public function hasInputToday()
    {
        // Ambil tanggal hari ini
        $today = now()->format('Y-m-d');

        // Periksa apakah ada input harga pada tanggal hari ini
        return $this->resumesemuahargapasar->where('tanggal_input', $today)->isNotEmpty();
    }

    public function hasInputYesterday()
    {
        // Ambil tanggal hari ini
        $yesterday = now()->subDay()->format('Y-m-d');

        // Periksa apakah ada input harga pada tanggal hari ini
        return $this->resumesemuahargapasar->where('tanggal_input', $yesterday)->isNotEmpty();
    }
}
