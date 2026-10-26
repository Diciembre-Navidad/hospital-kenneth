<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use Illuminate\Http\Request;

class ConsultoriosController extends Controller
{
    public function getConsultorios(){
        $consultorios = Consultorio::all();
        return view('consultorios', compact('consultorios'));
    }

    public function createConsultorio(Request $request){
        $datos = $request->validate([
            'nombre' => 'required|string|max:100|unique:consultorios,nombre',
        ]);

        Consultorio::create($datos);

        return redirect('/consultorios')->with([
            'mensaje' => 'Consultorio registrado correctamente'
        ]);
    }

    public function updateConsultorio(Request $request, int $id){
        $datos = $request->validate([
            'nombre' => 'required|string|max:100|unique:consultorios,nombre,' . $id,
        ]);

        Consultorio::findOrFail($id)->update($datos);

        return redirect('/consultorios')->with([
            'mensaje' => 'Consultorio actualizado correctamente'
        ]);
    }

    public function deleteConsultorio(int $id){
        $consultorio = Consultorio::findOrFail($id);

        if ($consultorio->citas()->exists()) {
            return redirect('/consultorios')->with([
                'error' => 'No se puede eliminar: tiene citas registradas'
            ]);
        }

        $consultorio->delete();

        return redirect('/consultorios')->with([
            'mensaje' => 'Consultorio eliminado correctamente'
        ]);
    }
}