<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomoditasCeger extends Model
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

    public function pendataanceger()
    {
        return $this->hasMany(PendataanPsCeger::class, 'komoditas_id');
    }

    public function reasonCeger()
    {
        return $this->hasMany(ReasonCeger::class, 'komoditas_id');
    }

    public function alasannaikhargaceger()
    {
        return $this->hasMany(AlasanKenaikanHargaCeger::class, 'komoditas_id');
    }

    public function stokceger()
    {
        return $this->hasMany(PendataanStokCeger::class, 'komoditas_id');
    }

    public function hasInputToday()
    {
        // Ambil tanggal hari ini
        $today = now()->format('Y-m-d');

        // Periksa apakah ada input harga pada tanggal hari ini
        return $this->pendataanceger->where('tanggal_input', $today)->isNotEmpty();
    }
    public function hasInputStokToday()
    {
        // Ambil tanggal hari ini
        $today = now()->format('Y-m-d');

        // Periksa apakah ada input harga pada tanggal hari ini
        return $this->stokceger->where('tanggal_input', $today)->isNotEmpty();
    }
}
