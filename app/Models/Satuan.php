<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nama_satuan'];
    protected $table = 'satuans';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function pendataan()
    {
        return $this->hasMany(PendataanAll::class);
    }
}
