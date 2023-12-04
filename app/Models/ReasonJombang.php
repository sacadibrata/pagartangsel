<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReasonJombang extends Model
{
    use HasFactory;
    protected $fillable = [
        'komoditas_id', 'nama_alasan'
    ];

    protected $table = 'reason_jombangs';

    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function komoditasjombang()
    {
        return $this->belongsTo(KomoditasJombang::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function alasanhargajombang()
    {
        return $this->hasMany(AlasanKenaikanHargaJombang::class, 'reason_id');
    }


}
