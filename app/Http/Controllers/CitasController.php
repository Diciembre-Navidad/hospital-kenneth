<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Consultorio;
use App\Models\Especialidad;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;

class CitasController extends Controller
{
    private array $horas = [
        '08:00', '08:30', '09:00', '09:30', '10:00', '10:30',
        '11:00', '11:30', '12:00', '12:30', '13:00', '13:30',
        '14:00', '14:30', '15:00', '15:30', '16:00', '16:30',
        '17:00', '17:30', '18:00', '18:30', '19:00', '19:30',
    ];

    public function getCitas(){
        $citas = Cita::with(['paciente', 'medico.especialidad', 'consultorio'])
            ->orderBy('fecha')
            ->orderBy('hora')
            ->get();
        $pacientes = Paciente::all();
        $medicos = Medico::with('especialidad')->get();
        $consultorios = Consultorio::all();
        $horas = $this->horas;

        return view('Citas', compact('citas', 'pacientes', 'medicos', 'consultorios', 'horas'));
    }

    public function createCita(Request $request){
        $datos = $request->validate($this->reglas());

        $error = $this->revisarCita($datos, 0);
        if ($error) {
            return redirect('/citas')->with(['error' => $error]);
        }

        $datos['estado'] = 'programada';
        Cita::create($datos);

        return redirect('/citas')->with(['mensaje' => 'Cita programada correctamente']);
    }

    public function updateCita(Request $request, int $id){
        $cita = Cita::findOrFail($id);

        if ($cita->estado != 'programada') {
            return redirect('/citas')->with(['error' => 'Solo se pueden modificar citas programadas']);
        }

        $datos = $request->validate($this->reglas());
        $error = $this->revisarCita($datos, $id);
        if ($error) {
            return redirect('/citas')->with(['error' => $error]);
        }

        $cita->update($datos);

        return redirect('/citas')->with(['mensaje' => 'Cita modificada correctamente']);
    }

    public function cancelCita(int $id){
        $cita = Cita::findOrFail($id);

        if ($cita->estado != 'programada') {
            return redirect('/citas')->with(['error' => 'Solo se pueden cancelar citas programadas']);
        }

        $cita->update(['estado' => 'cancelada']);

        return redirect('/citas')->with(['mensaje' => 'Cita cancelada correctamente']);
    }

    public function realizarCita(int $id){
        $cita = Cita::findOrFail($id);

        if ($cita->estado != 'programada') {
            return redirect('/citas')->with(['error' => 'Solo se pueden marcar como realizadas las citas programadas']);
        }

        if ($cita->fecha > date('Y-m-d')) {
            return redirect('/citas')->with(['error' => 'No puedes marcar como realizada una cita futura']);
        }

        $cita->update(['estado' => 'realizada']);

        return redirect('/citas')->with(['mensaje' => 'Consulta marcada como realizada']);
    }

    private function reglas(){
        return [
            'paciente_id'    => 'required|exists:pacientes,id',
            'medico_id'      => 'required|exists:medicos,id',
            'consultorio_id' => 'required|exists:consultorios,id',
            'fecha'          => 'required|date|after_or_equal:today',
            'hora'           => 'required|in:' . implode(',', $this->horas),
            'motivo'         => 'nullable|string|max:255',
        ];
    }

    private function revisarCita(array $datos, int $citaId){
        $medico = Medico::findOrFail($datos['medico_id']);


        if (!$medico->activo) {
            return 'El médico seleccionado está inactivo';
        }

        if (!Especialidad::find($medico->especialidad_id)) {
            return 'El médico no tiene una especialidad registrada';
        }

        if (date('w', strtotime($datos['fecha'])) == 0) {
            return 'La clínica no atiende los domingos';
        }

        if ($datos['fecha'] == date('Y-m-d') && $datos['hora'] <= date('H:i')) {
            return 'Esa hora ya pasó, elige un horario posterior';
        }

        $medicoOcupado = Cita::where('medico_id', $datos['medico_id'])
            ->where('fecha', $datos['fecha'])
            ->where('hora', $datos['hora'])
            ->where('estado', '!=', 'cancelada')
            ->where('id', '!=', $citaId)
            ->exists();
        if ($medicoOcupado) {
            return 'El médico ya tiene una cita en ese horario';
        }

        $consultorioOcupado = Cita::where('consultorio_id', $datos['consultorio_id'])
            ->where('fecha', $datos['fecha'])
            ->where('hora', $datos['hora'])
            ->where('estado', '!=', 'cancelada')
            ->where('id', '!=', $citaId)
            ->exists();
        if ($consultorioOcupado) {
            return 'El consultorio ya está ocupado en ese horario';
        }

        return null;
    }
}