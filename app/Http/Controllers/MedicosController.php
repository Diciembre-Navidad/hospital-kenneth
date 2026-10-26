<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Especialidad;
use Illuminate\Http\Request;

class MedicosController extends Controller
{
    public function getMedicos(){
        $medicos = Medico::with('especialidad')->get();
        $especialidades = Especialidad::all();
        return view('Medicos', compact('medicos', 'especialidades'));
    }

    public function createMedico(Request $request){
        $datos = $request->validate([
            'nombre' => 'required|string|max:100',
            'cedula' => 'required|string|max:20|unique:medicos,cedula',
            'especialidad_id' => 'required|exists:especialidads,id',
            'activo' => 'required|in:0,1',
        ]);

        Medico::create($datos);

        return redirect('/medicos')->with([
            'mensaje' => 'Médico registrado correctamente'
        ]);
    }

    public function updateMedico(Request $request, int $id){
        $datos = $request->validate([
            'nombre' => 'required|string|max:100',
            'cedula' => 'required|string|max:20|unique:medicos,cedula,' . $id,
            'especialidad_id' => 'required|exists:especialidads,id',
            'activo' => 'required|in:0,1',
        ]);

        Medico::findOrFail($id)->update($datos);

        return redirect('/medicos')->with([
            'mensaje' => 'Médico actualizado correctamente'
        ]);
    }

    public function deleteMedico(int $id){
        $medico = Medico::findOrFail($id);

        if ($medico->citas()->exists()) {
            return redirect('/medicos')->with([
                'error' => 'No se puede eliminar: tiene citas registradas'
            ]);
        }

        $medico->delete();

        return redirect('/medicos')->with([
            'mensaje' => 'Médico eliminado correctamente'
        ]);
    }
}