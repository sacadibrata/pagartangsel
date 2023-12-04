<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nama_kec', 'kota_id', 'longitude', 'latitude'];
    protected $table = 'kecamatans';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }
}
