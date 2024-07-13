<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;

class ListProject extends Component
{
    public function render()
    {
        return view('livewire.projects.list-project', ['projects' => Project::paginate()]);
    }
}
