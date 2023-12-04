<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReasonCiputat extends Model
{
    use HasFactory;
    protected $fillable = [
        'komoditas_id', 'nama_alasan'
    ];

    protected $table = 'reason_ciputats';

    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function komoditasciputat()
    {
        return $this->belongsTo(KomoditasCiputat::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function alasanhargaciputat()
    {
        return $this->hasMany(AlasanKenaikanHargaCiputat::class, 'reason_id');
    }
}
