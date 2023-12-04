<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomoditasJombang extends Model
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

    public function pendataanjombang()
    {
        return $this->hasMany(PendataanPsJombang::class, 'komoditas_id');
    }

    public function reasonJombang()
    {
        return $this->hasMany(ReasonJombang::class, 'komoditas_id');
    }

    public function alasannaikhargajombang()
    {
        return $this->hasMany(AlasanKenaikanHargaJombang::class, 'komoditas_id');
    }

    public function hasInputToday()
    {
        // Ambil tanggal hari ini
        $today = now()->format('Y-m-d');

        // Periksa apakah ada input harga pada tanggal hari ini
        return $this->pendataanjombang->where('tanggal_input', $today)->isNotEmpty();
    }

    public function stokjombang()
    {
        return $this->hasMany(PendataanStokJombang::class, 'komoditas_id');
    }

    public function hasInputStokToday()
    {
        // Ambil tanggal hari ini
        $today = now()->format('Y-m-d');

        // Periksa apakah ada input harga pada tanggal hari ini
        return $this->stokjombang->where('tanggal_input', $today)->isNotEmpty();
    }
}
