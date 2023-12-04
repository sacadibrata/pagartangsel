<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedagang extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nama_pedagang', 'kota_id', 'kecamatan_id', 'pasar_id'];
    protected $table = 'pedagangs';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function pasar()
    {
        return $this->belongsTo(Pasar::class);
    }
}
