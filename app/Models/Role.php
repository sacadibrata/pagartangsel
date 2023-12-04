<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nama_role'];
    protected $table = 'roles';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
