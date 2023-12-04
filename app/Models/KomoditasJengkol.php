<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomoditasJengkol extends Model
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

    public function pendataanjengkol()
    {
        return $this->hasMany(PendataanPsJengkol::class, 'komoditas_id');
    }

    public function reasonJengkol()
    {
        return $this->hasMany(ReasonJengkol::class, 'komoditas_id');
    }

    public function alasannaikhargajengkol()
    {
        return $this->hasMany(AlasanKenaikanHargaJengkol::class, 'komoditas_id');
    }

    public function hasInputToday()
    {
        // Ambil tanggal hari ini
        $today = now()->format('Y-m-d');

        // Periksa apakah ada input harga pada tanggal hari ini
        return $this->pendataanjengkol->where('tanggal_input', $today)->isNotEmpty();
    }

    public function stokjengkol()
    {
        return $this->hasMany(PendataanStokJengkol::class, 'komoditas_id');
    }

    public function hasInputStokToday()
    {
        // Ambil tanggal hari ini
        $today = now()->format('Y-m-d');

        // Periksa apakah ada input harga pada tanggal hari ini
        return $this->stokjengkol->where('tanggal_input', $today)->isNotEmpty();
    }
}
