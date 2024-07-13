<?php

namespace App\Livewire\Forms;

use App\Models\Task;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Support\Str;


class TaskForm extends Form
{
    public ?Task $task;

    #[Validate('required|min:5')]
    public $name = '';

    #[Validate('required|min:5')]
    public $description = '';

    #[Validate('sometimes|required')]
    public $due_date = null;

    #[Validate('required')]
    public $position = 1;

    #[Validate('sometimes|required|numeric')]
    public $project_id;

    #[Validate('sometimes|required|numeric')]
    public $task_list_id;

    #[Validate('required')]
    public $priority;

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
    }

    public function store(array $data): void
    {
        $this->project_id = $data['project_id'];
        $this->task_list_id = $data['list_id'];

        $this->validate();

        Task::create(array_merge([
            'uuid' => Str::uuid(),
            'created_by' => auth()->id(),
        ], $this->all()));

        $this->reset();
    }

    public function update(): void
    {
        $this->validate();
        $this->task->update($this->all());

        $this->reset();
    }
}
