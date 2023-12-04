<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlasanKenaikanHargaJombang extends Model
{
    use HasFactory;
    protected $fillable = [ 'surveyor_id','pasar_id', 'tanggal_input', 'komoditas_id', 'hargaKemarin',
    'hargaHariIni', 'perubahanHarga', 'reason_id'];
    protected $table = 'alasan_kenaikan_harga_jombangs';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function komoditasjombang()
    {
        return $this->belongsTo(KomoditasJombang::class);
    }

    public function reasonjombang()
    {
        return $this->belongsTo(ReasonJombang::class);
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
