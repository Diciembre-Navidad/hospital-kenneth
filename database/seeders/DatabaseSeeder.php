<?php

namespace Database\Seeders;

use App\Models\Consultorio;
use App\Models\Especialidad;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $general = Especialidad::create(['nombre' => 'Medicina general']);
        $cardio = Especialidad::create(['nombre' => 'Cardiología']);
        $pediatria = Especialidad::create(['nombre' => 'Pediatría']);

        Medico::create(['nombre' => 'Dra. Emil Zanei', 'cedula' => '1000001', 'especialidad_id' => $general->id, 'activo' => 1]);
        Medico::create(['nombre' => 'Dr. Carlos Ruiz', 'cedula' => '1000002', 'especialidad_id' => $cardio->id, 'activo' => 1]);
        Medico::create(['nombre' => 'Dr. Jorge Barrios', 'cedula' => '1000003', 'especialidad_id' => $pediatria->id, 'activo' => 0]);

        Consultorio::create(['nombre' => 'Consultorio 1']);
        Consultorio::create(['nombre' => 'Consultorio 2']);

        Paciente::create(['nombre' => 'Ana Torres', 'fecha_nacimiento' => '1998-03-14']);
        Paciente::create(['nombre' => 'Luis Herrera', 'fecha_nacimiento' => '1985-07-02']);
    }
}