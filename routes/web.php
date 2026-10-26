<?php

use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\MedicosController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\ConsultoriosController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\ReportesController;
use Illuminate\Support\Facades\Route;
use App\Models\Cita;
use App\Models\Medico;
use App\Models\Paciente;

Route::get('/', function () {
    return redirect('/home');
});

Route::get('home', function () {
    $hoy = date('Y-m-d');

    $citasHoy = Cita::where('fecha', $hoy)->where('estado', 'programada')->count();
    $medicosActivos = Medico::where('activo', 1)->count();
    $totalPacientes = Paciente::count();
    $realizadas = Cita::where('estado', 'realizada')->count();

    $proximas = Cita::with(['paciente', 'medico', 'consultorio'])
        ->where('estado', 'programada')
        ->where('fecha', '>=', $hoy)
        ->orderBy('fecha')
        ->orderBy('hora')
        ->take(5)
        ->get();

    return view('Home', compact('citasHoy', 'medicosActivos', 'totalPacientes', 'realizadas', 'proximas'));
});


Route::get('especialidades', [EspecialidadController::class, 'getEspecialidades'])
->name('especialidad.get');
Route::post('especialidades/create', [EspecialidadController::class, 'createEspecialidad'])
->name('especialidad.create');
Route::put('especialidades/update/{id}', [EspecialidadController::class, 'updateEspecialidad'])
->name('especialidad.update');
Route::delete('especialidades/delete/{id}', [EspecialidadController::class, 'deleteEspecialidad'])
->name('especialidad.delete');


Route::get('medicos', [MedicosController::class, 'getMedicos'])
->name('medico.get');
Route::post('medicos/create', [MedicosController::class, 'createMedico'])
->name('medico.create');
Route::put('medicos/update/{id}', [MedicosController::class, 'updateMedico'])
->name('medico.update');
Route::delete('medicos/delete/{id}', [MedicosController::class, 'deleteMedico'])
->name('medico.delete');

Route::get('pacientes', [PacientesController::class, 'getPacientes'])
->name('paciente.get');
Route::post('pacientes/create', [PacientesController::class, 'createPaciente'])
->name('paciente.create');
Route::put('pacientes/update/{id}', [PacientesController::class, 'updatePaciente'])
->name('paciente.update');
Route::delete('pacientes/delete/{id}', [PacientesController::class, 'deletePaciente'])
->name('paciente.delete');

Route::get('consultorios', [ConsultoriosController::class, 'getConsultorios'])
->name('consultorio.get');
Route::post('consultorios/create', [ConsultoriosController::class, 'createConsultorio'])
->name('consultorio.create');
Route::put('consultorios/update/{id}', [ConsultoriosController::class, 'updateConsultorio'])
->name('consultorio.update');
Route::delete('consultorios/delete/{id}', [ConsultoriosController::class, 'deleteConsultorio'])
->name('consultorio.delete');

Route::get('citas', [CitasController::class, 'getCitas'])
->name('cita.get');
Route::post('citas/create', [CitasController::class, 'createCita'])
->name('cita.create');
Route::put('citas/update/{id}', [CitasController::class, 'updateCita'])
->name('cita.update');
Route::put('citas/cancel/{id}', [CitasController::class, 'cancelCita'])
->name('cita.cancel');
Route::put('citas/realizada/{id}', [CitasController::class, 'realizarCita'])
->name('cita.realizada');

Route::get('pacientes/historial/{id}', [ReportesController::class, 'historialPaciente'])
->name('reporte.historial');
Route::get('medicos/citas/{id}', [ReportesController::class, 'citasMedico'])
->name('reporte.medico');
Route::get('reportes', [ReportesController::class, 'consultasRealizadas'])
->name('reporte.consultas');