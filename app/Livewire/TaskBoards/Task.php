<?php

namespace App\Livewire\TaskBoards;

use App\Models\Task as TaskModel;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class Task extends Component
{
    #[Reactive]
    public TaskModel $task;

    public function render()
    {
        return view('livewire.task-boards.task');
    }
}
