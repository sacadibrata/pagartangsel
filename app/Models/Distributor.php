<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;
    protected $fillable = ['kategori_id', 'nama','alamat','telepon','gambar','url','latitude','longitude'];
    protected $table = 'distributors';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
