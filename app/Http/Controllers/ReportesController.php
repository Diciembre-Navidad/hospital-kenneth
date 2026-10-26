<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Medico;
use App\Models\Paciente;

class ReportesController extends Controller
{
    public function historialPaciente(int $id){
        $paciente = Paciente::findOrFail($id);
        $citas = Cita::with(['medico.especialidad', 'consultorio'])
            ->where('paciente_id', $id)
            ->orderBy('fecha', 'desc')
            ->orderBy('hora', 'desc')
            ->get();

        return view('Historial', compact('paciente', 'citas'));
    }

    public function citasMedico(int $id){
        $medico = Medico::with('especialidad')->findOrFail($id);
        $citas = Cita::with(['paciente', 'consultorio'])
            ->where('medico_id', $id)
            ->where('estado', 'programada')
            ->orderBy('fecha')
            ->orderBy('hora')
            ->get();

        return view('CitasMedico', compact('medico', 'citas'));
    }

    public function consultasRealizadas(){
        $medicos = Medico::with(['especialidad', 'citas'])->get();
        $total = Cita::where('estado', 'realizada')->count();

        return view('Reportes', compact('medicos', 'total'));
    }
}