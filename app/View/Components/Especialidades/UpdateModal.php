<?php

namespace App\View\Components\Especialidades;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Especialidad;

class UpdateModal extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Especialidad $especialidad)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.especialidades.update-modal');
    }
}
