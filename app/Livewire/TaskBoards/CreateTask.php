<?php

namespace App\Livewire\TaskBoards;

use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Illuminate\Support\Str;
use Livewire\Component;

class CreateTask extends Component
{
    public TaskForm $form;
    public string $projectId;
    public string $selectedListId;

    public function save()
    {
        $this->validate();

        $project = Task::create(array_merge([
            'uuid' => Str::uuid(),
            'created_by' => auth()->id(),
            'project_id' => $this->projectId,
            'task_list_id' => $this->selectedListId,
        ], $this->form->all()));

        $this->notify('Task has been created successfully.');
        $this->dispatch('task-created');
        $this->dispatch('close-form');

    }

    public function render()
    {
        return view('livewire.task-boards.create-task');
    }
}
