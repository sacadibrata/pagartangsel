<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomoditasSerpong extends Model
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

    public function pendataanserpong()
    {
        return $this->hasMany(PendataanPsSerpong::class, 'komoditas_id');
    }

    public function hasInputToday()
    {
        // Ambil tanggal hari ini
        $today = now()->format('Y-m-d');

        // Periksa apakah ada input harga pada tanggal hari ini
        return $this->pendataanserpong->where('tanggal_input', $today)->isNotEmpty();
    }

    public function stokserpong()
    {
        return $this->hasMany(PendataanStokSerpong::class, 'komoditas_id');
    }

    public function hasInputStokToday()
    {
        // Ambil tanggal hari ini
        $today = now()->format('Y-m-d');

        // Periksa apakah ada input harga pada tanggal hari ini
        return $this->stokserpong->where('tanggal_input', $today)->isNotEmpty();
    }
}
