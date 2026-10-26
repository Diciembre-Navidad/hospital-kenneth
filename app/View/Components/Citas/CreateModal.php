<?php

namespace App\View\Components\Citas;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CreateModal extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $pacientes, public $medicos, public $consultorios, public $horas)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.citas.create-modal');
    }
}
