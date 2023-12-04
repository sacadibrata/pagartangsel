<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendataanPsJombang extends Model
{
    use HasFactory;
    protected $fillable = [
        'surveyor_id','pasar_id', 'tanggal_input', 'komoditas_id', 'harga_pedagang_1',
        'harga_pedagang_2', 'harga_pedagang_3', 'average_harga'
    ];

    protected $table = 'pendataan_ps_jombangs';

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

    public function pasar()
    {
        return $this->belongsTo(Pasar::class);
    }

    public function surveyor()
    {
        return $this->belongsTo(DataSurveyor::class);
    }
}
