<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komoditas extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'kategori_id', 'nama_komoditas',  'satuan_id','gambar'];
    protected $table = 'komoditas';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function gabungandata()
    {
        return $this->hasMany(GabungData::class, 'komoditas_id');
    }

    public function pasar()
    {
        return $this->belongsTo(Pasar::class);
    }

    public function pendataan()
    {
        return $this->hasMany(PendataanAll::class, 'komoditas_id');
    }

    public function pendataanciputat()
    {
        return $this->hasMany(PendataanPsCiputat::class);
    }

    public function hasInputToday()
    {
        // Ambil tanggal hari ini
        $today = now()->format('Y-m-d');

        // Periksa apakah ada input harga pada tanggal hari ini
        return $this->pendataan->where('tanggal_input', $today)->isNotEmpty();
    }
}
