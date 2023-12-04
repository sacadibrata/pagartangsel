<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReasonJengkol extends Model
{
    use HasFactory;
    protected $fillable = [
        'komoditas_id', 'nama_alasan'
    ];

    protected $table = 'reason_jengkols';

    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function komoditasjengkol()
    {
        return $this->belongsTo(KomoditasJengkol::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function alasanhargajengkol()
    {
        return $this->hasMany(AlasanKenaikanHargaJengkol::class, 'reason_id');
    }
}
