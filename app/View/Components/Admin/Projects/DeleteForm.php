<?php

namespace App\View\Components\Admin\Projects;

use App\Models\Project;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Project $project, public bool $compact = false)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.projects.delete-form');
    }
}
