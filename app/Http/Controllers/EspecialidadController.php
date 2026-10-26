<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;

class EspecialidadController extends Controller
{
    public function getEspecialidades(){
        $especialidades = Especialidad::all();
        return view('Especialidades', compact('especialidades'));
    }

    public function createEspecialidad(Request $request){
        $datos = $request->validate([
            'nombre' => 'required|string|max:100|unique:especialidads,nombre',
        ]);

        Especialidad::create($datos);

        return redirect('/especialidades')->with([
            'mensaje' => 'Especialidad registrada'
        ]);
    }

    public function updateEspecialidad(Request $request, int $id){
        $datos = $request->validate([
            'nombre' => 'required|string|max:100|unique:especialidads,nombre,' . $id,
        ]);

        Especialidad::findOrFail($id)->update($datos);

        return redirect('/especialidades')->with([
            'mensaje' => 'Especialidad actualizada correctamente'
        ]);
    }

    public function deleteEspecialidad(int $id){
        $especialidad = Especialidad::findOrFail($id);

        if ($especialidad->medicos()->exists()) {
            return redirect('/especialidades')->with([
                'error' => 'No se puede eliminar, hay medicos registrados'
            ]);
        }

        $especialidad->delete();

        return redirect('/especialidades')->with([
            'mensaje' => 'Especialidad eliminada correctamente'
        ]);
    }
}
