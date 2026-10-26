<?php

namespace App\View\Components\Medicos;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Medico;

class DeleteModal extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Medico $medico)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.medicos.delete-modal');
    }
}
