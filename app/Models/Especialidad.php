<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = 'especialidads';
    protected $fillable = ['nombre'];

public function medicos(){
    return $this->hasMany(Medico::class, 'especialidad_id');
}
}
