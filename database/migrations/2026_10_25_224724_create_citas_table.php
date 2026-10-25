<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('paciente_id')->constrained('pacientes');
            $table->foreignId('medico_id')->constrained('medicos');
            $table->foreignId('consultorio_id')->constrained('consultorios');
            $table->date('fecha');
            $table->time('hora');
            $table->string('estado')->default('programada');
            $table->string('motivo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
