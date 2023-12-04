<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendataanHargaSemuaPasar extends Model
{
    use HasFactory;
    protected $fillable = [
        'surveyor_id','pasar_id', 'tanggal_input', 'komoditas_id', 'pendataan_ps_ciputats_id','pendataan_ps_cimanggis_id', 'pendataan_ps_jengkols_id','pendataan_ps_serpongs_id','pendataan_ps_jombangs_id','pendataan_ps_cegers_id',
        'average_harga'
    ];

    protected $table = 'pendataan_harga_semua_pasars';

    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function komoditassemuapasar()
    {
        return $this->belongsTo(KomoditasSemuaPasar::class);
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
