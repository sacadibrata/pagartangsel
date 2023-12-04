<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendataanStokCiputat extends Model
{
    use HasFactory;
    protected $fillable = [
        'surveyor_id','pasar_id', 'tanggal_input', 'komoditas_id', 'stok',
        'stok_pedagang_1','stok_pedagang_2','stok_pedagang_3',
        'average_stok'
    ];
    protected $table = 'pendataan_stok_ciputats';

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

    public function pasar()
    {
        return $this->belongsTo(Pasar::class);
    }

    public function surveyor()
    {
        return $this->belongsTo(DataSurveyor::class);
    }
}

