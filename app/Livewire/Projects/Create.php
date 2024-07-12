<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $description;

    public function save()
    {
        $validatedData = $this->validate([
            'name' => 'required|min:6',
            'description' => 'required|min:6'
        ]);

        Project::create($validatedData);
        session()->flash('status', 'Post successfully updated.');

    }

    public function render()
    {
        return view('livewire.projects.create');
    }
}
