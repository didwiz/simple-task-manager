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

    public function delete(Task $task)
    {
        $this->form->delete();

        $this->notify('Task has been deleted successfully.');
        $this->dispatch('task-deleted', ['task_id' => $task->id, 'list_id' => $task->task_list_id]);


        $this->dispatch('close');
    }

    public function closeEditSection()
    {
        $this->reset('state');
        $this->task = $this->task->refresh();
    }


    public function render()
    {
        return view('livewire.task-boards.edit-task');
    }
}
