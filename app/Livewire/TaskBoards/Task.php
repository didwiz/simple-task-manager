<?php

namespace App\Livewire\TaskBoards;

use App\Models\Task as TaskModel;
use Livewire\Component;

class Task extends Component
{
    public TaskModel $task;

    public function editTask(TaskModel $task){
        $this->dispatch('edit-task',$task->id);
    }

    public function render()
    {
        return view('livewire.task-boards.task');
    }
}
