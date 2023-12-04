<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GabungData extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'pasar_id','tanggal_input','komoditas_id','average_harga'];
    protected $table = 'gabung_data';
    public $timestamps = false;

    public function pasar()
    {
        return $this->belongsTo(Pasar::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function komoditas()
    {
        return $this->belongsTo(Komoditas::class,'komoditas_id');
    }
}
