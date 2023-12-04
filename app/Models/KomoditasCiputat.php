<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomoditasCiputat extends Model
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

    public function pendataanciputat()
    {
        return $this->hasMany(PendataanPsCiputat::class, 'komoditas_id');
    }

    public function reasonCiputat()
    {
        return $this->hasMany(ReasonCiputat::class, 'komoditas_id');
    }

    public function alasannaikhargaciputat()
    {
        return $this->hasMany(AlasanKenaikanHargaCiputat::class, 'komoditas_id');
    }

    public function hasInputToday()
    {
        // Ambil tanggal hari ini
        $today = now()->format('Y-m-d');

        // Periksa apakah ada input harga pada tanggal hari ini
        return $this->pendataanciputat->where('tanggal_input', $today)->isNotEmpty();
    }

    public function stokciputat()
    {
        return $this->hasMany(PendataanStokCiputat::class, 'komoditas_id');
    }

    public function hasInputStokToday()
    {
        // Ambil tanggal hari ini
        $today = now()->format('Y-m-d');

        // Periksa apakah ada input harga pada tanggal hari ini
        return $this->stokciputat->where('tanggal_input', $today)->isNotEmpty();
    }
}
