<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumePendataanHargaPasar extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal_input', 'komoditas_id', 'pendataan_ps_ciputats_id','pendataan_ps_cimanggis_id',
        'pendataan_ps_jengkols_id','pendataan_ps_serpongs_id', 'pendataan_ps_jombangs_id',
        'pendataan_ps_cegers_id', 'pendataan_harga_semua_pasars_id',
    ];

    protected $table = 'resume_pendataan_harga_pasars';

    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function komoditassemuapasar()
    {
        return $this->belongsTo(KomoditasSemuaPasar::class);
    }

    public function resumekomoditassemuapasar()
    {
        return $this->belongsTo(ResumeKomoditiSemuaHarga::class);
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
