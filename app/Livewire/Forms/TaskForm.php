<?php

namespace App\Livewire\Forms;

use App\Enums\TaskPriority;
use App\Events\ProjectCreated;
use App\Models\Task;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Support\Str;


class TaskForm extends Form
{
    public ?Task $task;

    #[Validate('required|min:5')]
    public $name = '';

    #[Validate('sometimes')]
    public $description = '';

    #[Validate('sometimes')]
    public $due_date = null;

    #[Validate('required')]
    public $position = 1;

    #[Validate('sometimes|required|numeric')]
    public $project_id;

    #[Validate('sometimes|required|numeric')]
    public $task_list_id;

    #[Validate('sometimes')]
    public $priority = TaskPriority::LOW;

    public $created_by = null;

    public function setTask(Task $task)
    {
        $this->task = $task;

        $this->name = $task->name;
        $this->description = $task->description;
        $this->due_date = $task->due_date;
        $this->position = $task->position;
        $this->project_id = $task->project_id;
        $this->task_list_id = $task->task_list_id;
        $this->priority = $task->priority;
        $this->created_by = $task->created_by;
    }

    public function store(array $data): Task
    {
        $this->project_id = $data['project_id'];
        $this->task_list_id = $data['list_id'];
        $this->created_by = auth()->id();

        $this->validate();

        $task =  Task::create(array_merge([
            'uuid' => Str::uuid(),
        ], $this->all()));

        $this->reset();

        return $task;
    }

    public function update(): ?Task
    {
        $task = $this->task;

        $this->validate();
        $task->update($this->all());

        return $task;
    }

    public function delete()
    {
        $this->task->delete();
        $this->reset();
    }
}
