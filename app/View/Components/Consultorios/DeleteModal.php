<?php

namespace App\View\Components\Consultorios;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Consultorio;

class DeleteModal extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Consultorio $consultorio)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.consultorios.delete-modal');
    }
}
