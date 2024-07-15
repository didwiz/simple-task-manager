<?php

namespace App\Livewire\TaskBoards;

use App\Livewire\Forms\TaskForm;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class CreateTask extends Component
{
    public TaskForm $form;
    public int $projectId;

    #[Reactive]
    public int $selectedListId;


    public function save()
    {
        $task = $this->form->store([
            'project_id' => $this->projectId,
            'list_id' => $this->selectedListId
        ]);

        $this->notify('Task has been created successfully.');
        $this->dispatch('task-created', $task->id);
        $this->dispatch('close');
    }

    public function render()
    {
        return view('livewire.task-boards.create-task');
    }
}
