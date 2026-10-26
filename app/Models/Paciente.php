<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';
    protected $fillable = ['nombre', 'fecha_nacimiento'];

public function citas(){
    return $this->hasMany(Cita::class, 'paciente_id');
}
}
