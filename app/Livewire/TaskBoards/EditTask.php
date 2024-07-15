<?php

namespace App\Livewire\TaskBoards;

use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Livewire\Component;

class EditTask extends Component
{
    public TaskForm $form;

    public int $selectedTaskId;

    public Task $task;

    public string $state;

    public function mount()
    {
        $task = Task::find($this->selectedTaskId);
        if ($task) {
            $this->task = $task;
            $this->form->setTask($task);
        }
    }


    public function save()
    {
        $task = $this->form->update();

        $this->notify('Task has been edited successfully.');
        $this->dispatch('task-edited', $task->id);
        $this->dispatch('close');
    }


    public function render()
    {
        return view('livewire.task-boards.edit-task');
    }
}
