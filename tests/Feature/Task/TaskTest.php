<?php

use App\Livewire\TaskBoards\CreateTask;
use App\Livewire\TaskBoards\EditTask;
use App\Models\Project;
use App\Models\Task;
use App\Models\TaskList;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);


it('render form successfully', function () {
    Livewire::test(CreateTask::class)
        ->assertStatus(200);
});

it('can create a new task', function () {
    $user = User::factory()->create();
    $taskList = TaskList::factory()->create();
    $project = Project::factory()->create();
    $data = [
        'name' => 'Test Task',
        'description' => 'This is a test task description',
        'due_date' => '2024-12-31',
        'position' => 1,
        'project_id' => $project->id,
        'task_list_id' => $taskList->id,
        'priority' => 'low',
        'created_by' => $user->id
    ];

    Livewire::actingAs($user)
        ->test(CreateTask::class, ['selectedListId' => $data['task_list_id'], 'projectId' => $data['project_id']])
        ->set('form.name', $data['name'])
        ->set('form.description', $data['description'])
        ->set('form.due_date', $data['due_date'])
        ->set('form.position', $data['position'])
        ->set('form.priority', $data['priority'])
        ->set('form.created_by', $data['created_by'])
        ->call('save')
        ->assertHasNoErrors();

    $this->assertDatabaseHas('tasks', [
        'name' => 'Test Task',
        'description' => 'This is a test task description',
        'created_by' => $user->id
    ]);
});

it('can update an existing task', function () {
    $user = User::factory()->create();
    $task = Task::factory()->create();

    Livewire::actingAs($user)
        ->test(EditTask::class, ['selectedTaskId' => $task->id])
        ->set('task', $task)
        ->set('form.name', "Edited Task")
        ->set('form.description', "Task {$task->id} description changed")
        ->set('form.priority', 'medium')
        ->set('form.created_by', $user->id)
        ->call('save')
        ->assertHasNoErrors();

    $this->assertDatabaseHas('tasks', [
        'uuid' => $task->uuid,
        'name' => 'Edited Task',
        'description' => "Task {$task->id} description changed",
        'created_by' => $user->id
    ]);
});
