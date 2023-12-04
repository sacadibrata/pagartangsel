<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasar extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'kota_id', 'kecamatan_id', 'nama_pasar', 'gambar','longitude','latitude'];
    protected $table = 'pasars';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function pendataan()
    {
        return $this->hasMany(Pendataan::class);
    }

    public function gabungandata()
    {
        return $this->hasMany(GabungData::class, 'pasar_id');
    }

    public function komoditas()
    {
        return $this->belongsTo(Komoditas::class);
    }

    public function profilPasar()
    {
        return $this->hasMany(ProfilPasar::class, 'pasar_id');
    }
}
