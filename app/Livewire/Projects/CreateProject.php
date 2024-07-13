<?php

namespace App\Livewire\Projects;

use App\Livewire\Forms\ProjectForm;
use App\Models\Project;
use Illuminate\Support\Str;
use Livewire\Component;

class CreateProject extends Component
{
    public ProjectForm $form;

    public function save()
    {
        $this->validate();

        $project = Project::create(array_merge([
            'uuid' => Str::uuid(),
            'user_id' => auth()->id()
        ], $this->form->all()));

        $this->notify('Project has been created successfully.');

        //redirect to kanban view
        $this->redirectRoute('projects.task-list', [$project->uuid]);
    }

    public function render()
    {
        return view('livewire.projects.create-project');
    }
}
