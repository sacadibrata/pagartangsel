<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReasonSerpong extends Model
{
    use HasFactory;
    protected $fillable = [
        'komoditas_id', 'nama_alasan'
    ];

    protected $table = 'reason_serpongs';

    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function komoditasserpong()
    {
        return $this->belongsTo(KomoditasSerpong::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function alasanhargaserpong()
    {
        return $this->hasMany(AlasanKenaikanHargaSerpong::class, 'reason_id');
    }

}
