<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSurveyor extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nama_surveyor', 'kota_id', 'kecamatan_id', 'pasar_id', 'user_id'];
    protected $table = 'data_surveyors';
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
        return $this->belongsTo(Pasar::class, 'pasar_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pendataan()
    {
        return $this->hasMany(Pendataan::class);
    }
}
