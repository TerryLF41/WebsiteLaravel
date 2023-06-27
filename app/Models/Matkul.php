<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;
    public function mkTawars()
    {
        return $this->hasMany(MkTawar::class, 'matkul_kode_matkul');
    }
}
