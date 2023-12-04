<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomoditasCimanggis extends Model
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

    public function pendataancimanggis()
    {
        return $this->hasMany(PendataanPsCimanggis::class, 'komoditas_id');
    }

    public function reasonCimanggis()
    {
        return $this->hasMany(ReasonCimanggis::class, 'komoditas_id');
    }

    public function alasannaikhargacimanggis()
    {
        return $this->hasMany(AlasanKenaikanHargaCimanggis::class, 'komoditas_id');
    }

    public function stokcimanggis()
    {
        return $this->hasMany(PendataanStokCimanggis::class, 'komoditas_id');
    }

    public function hasInputToday()
    {
        // Ambil tanggal hari ini
        $today = now()->format('Y-m-d');

        // Periksa apakah ada input harga pada tanggal hari ini
        return $this->pendataancimanggis->where('tanggal_input', $today)->isNotEmpty();
    }
    public function hasInputStokToday()
    {
        // Ambil tanggal hari ini
        $today = now()->format('Y-m-d');

        // Periksa apakah ada input harga pada tanggal hari ini
        return $this->stokcimanggis->where('tanggal_input', $today)->isNotEmpty();
    }
}
