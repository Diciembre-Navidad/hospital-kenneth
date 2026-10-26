<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    public function getPacientes(){
        $pacientes = Paciente::all();
        return view('Pacientes', compact('pacientes'));
    }

    public function createPaciente(Request $request){
        $datos = $request->validate([
            'nombre' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date|before:today',
        ]);

        Paciente::create($datos);

        return redirect('/pacientes')->with([
            'mensaje' => 'Paciente registrado correctamente'
        ]);
    }

    public function updatePaciente(Request $request, int $id){
        $datos = $request->validate([
            'nombre' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date|before:today',
        ]);

        Paciente::findOrFail($id)->update($datos);

        return redirect('/pacientes')->with([
            'mensaje' => 'Paciente actualizado correctamente'
        ]);
    }

    public function deletePaciente(int $id){
        $paciente = Paciente::findOrFail($id);
        if ($paciente->citas()->exists()) {
            return redirect('/pacientes')->with([
                'error' => 'No se puede eliminar: tiene citas registradas'
            ]);
        }

        $paciente->delete();

        return redirect('/pacientes')->with([
            'mensaje' => 'Paciente eliminado correctamente'
        ]);
    }
}