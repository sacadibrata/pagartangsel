<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nama_kategori','gambar_kategori'];
    protected $table = 'kategoris';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function pendataan()
    {
        return $this->hasMany(PendataanAll::class);
    }
    public function distributor()
    {
        return $this->hasMany(Distributor::class, 'kategori_id');
    }
}
