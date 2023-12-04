<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReasonCimanggis extends Model
{
    use HasFactory;
    protected $fillable = [
        'komoditas_id', 'nama_alasan'
    ];

    protected $table = 'reason_cimanggis';

    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function komoditascimanggis()
    {
        return $this->belongsTo(KomoditasCimanggis::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function alasanhargacimanggis()
    {
        return $this->hasMany(AlasanKenaikanHargaCimanggis::class, 'reason_id');
    }
}
