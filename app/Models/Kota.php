<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nama_kota'];
    protected $table = 'kotas';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
