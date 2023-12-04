<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlasanKenaikanHargaSerpong extends Model
{
    use HasFactory;
    protected $fillable = [ 'surveyor_id','pasar_id', 'tanggal_input', 'komoditas_id', 'hargaKemarin',
    'hargaHariIni', 'perubahanHarga', 'reason_id'];
    protected $table = 'alasan_kenaikan_harga_serpongs';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function komoditasserpong()
    {
        return $this->belongsTo(KomoditasSerpong::class);
    }

    public function reasonserpong()
    {
        return $this->belongsTo(ReasonSerpong::class);
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
