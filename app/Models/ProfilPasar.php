<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilPasar extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'pasar_id', 'sejarah', 'alamat', 'jam','luas','kios','los','jenisBarang'];
    protected $table = 'profil_pasars';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function pasar()
    {
        return $this->belongsTo(Pasar::class);
    }
}
