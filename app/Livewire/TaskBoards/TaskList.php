<?php

namespace App\Livewire\TaskBoards;

use App\Models\Project;
use Livewire\Attributes\On;
use Livewire\Component;

class TaskList extends Component
{
    public Project $project;

    public ?string $state;

    public ?string $selectedListId;


    #[On('close-form')]
    public function resetState()
    {
        $this->reset(['state','selectedListId']);
    }

    public function addTask( $taskListId){
        $this->selectedListId = $taskListId;
        $this->state = 'open-modal';
    }

    #[On('edit-task')]
    public function editTask($taskListId){
        $this->selectedListId = $taskListId;
        $this->state = 'open-modal';
    }


    public function render()
    {
        return view('livewire.task-boards.task-list');
    }
}
