<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table = 'medicos';
    protected $fillable = ['nombre', 'cedula', 'especialidad_id', 'activo'];

public function especialidad(){
    return $this->belongsTo(Especialidad::class, 'especialidad_id');
}
public function citas(){
    return $this->hasMany(Cita::class, 'medico_id');
}
}
