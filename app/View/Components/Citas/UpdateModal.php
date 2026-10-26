<?php

namespace App\View\Components\Citas;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UpdateModal extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Cita $cita, public $pacientes, public $medicos, public $consultorios, public $horas)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.citas.update-modal');
    }
}
