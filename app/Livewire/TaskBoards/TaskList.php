<?php

namespace App\Livewire\TaskBoards;

use App\Models\Project;
use Livewire\Attributes\On;
use Livewire\Component;

class TaskList extends Component
{
    public Project $project;

    public ?string $state;

    public int $selectedListId = 0;
    public int $selectedTaskId = 0;


    #[On('close-modal')]
    public function resetComponent()
    {
        $this->reset(['state', 'selectedListId', 'selectedTaskId']);
        $this->project = $this->project->refresh();
    }

    public function addTask($taskListId)
    {
        $this->resetComponent();
        $this->selectedListId = $taskListId;
        $this->dispatch('open-modal', 'add-task');
    }

    public function editTask($taskId, $taskListId)
    {
        $this->resetComponent();

        $this->selectedListId = $taskListId;
        $this->selectedTaskId = $taskId;

        $this->state = 'edit-task';
        $this->dispatch('open-modal', 'edit-task');
    }


    public function render()
    {
        return view('livewire.task-boards.task-list');
    }
}
