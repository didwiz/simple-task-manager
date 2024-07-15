<?php

namespace App\Livewire\TaskBoards;

use App\Enums\TaskPriority;
use App\Models\Project;
use App\Models\Task;
use App\Models\TaskList as ModelsTaskList;
use Livewire\Attributes\On;
use Livewire\Component;

class TaskList extends Component
{
    public Project $project;

    public ?string $state;

    public int $selectedListId = 0;
    public int $selectedTaskId = 0;

    public array $taskLists = [];

    public function mount(Project $project)
    {
        $this->init($project);
    }

    private function init(Project $project)
    {
        $project->load([
            'taskLists' => function ($query) {
                $query->orderBy('position')->with([
                    'tasks' => function ($query) {
                        $query->orderBy('position');
                    }
                ]);
            }
        ]);

        $this->project = $project;
        $this->taskLists = $this->project->taskLists->map(function ($taskList) {
            return [
                'id' => $taskList->id,
                'name' => $taskList->name,
                'position' => $taskList->position,
                'tasks' => $taskList->tasks->map(function ($task) {
                    return [
                        'id' => $task->id,
                        'uuid' => $task->uuid,
                        'name' => $task->name,
                        'description' => $task->description,
                        'priority' => $task->priority,
                        'status' => $task->status,
                        'position' => $task->position,
                        'due_date' => $task->due_date?->format('d/m/Y'),
                        'created_by' => $task->created_by,
                    ];
                })->toArray(),
            ];
        })->toArray();
    }

    #[On('task-list-created')]
    public function addTaskList(ModelsTaskList $taskList)
    {
        $addedTaskList = $taskList->toArray();
        $this->taskLists[]  = $addedTaskList;
    }

    public function deleteTaskList(ModelsTaskList $taskList)
    {
        $taskList->delete();

        $selectedTaskListID = $taskList->id;
        $this->taskLists = collect($this->taskLists)->reject(function ($taskList) use ($selectedTaskListID) {
            return $taskList['id'] === $selectedTaskListID;
        })->toArray();
    }

    #[On('task-created')]
    public function addTask(Task $task)
    {
        foreach ($this->taskLists as &$taskList) {
            if ($taskList['id'] === $task->task_list_id) {
                // Add the new task to the tasks array of the appropriate task list
                $task = array_merge($task->toArray(), ['due_date' => $task->due_date?->format('d/m/Y')]);
                $taskList['tasks'][] = $task;
                return;
            }
        }
    }

    #[On('task-edited')]
    public function editTask(Task $editedTask)
    {
        foreach ($this->taskLists as &$taskList) {
            if ($taskList['id'] === $editedTask->task_list_id) {
                // find task in array and swap out with updated info
                foreach ($taskList['tasks'] as $index => $task) {
                    if ($task['id'] === $editedTask->id) {
                        $editedTask = array_merge($editedTask->toArray(), ['due_date' => $editedTask->due_date?->format('d/m/Y')]);
                        $taskList['tasks'][$index] = $editedTask;
                        return;
                    }
                }
                return;
            }
        }
    }


    #[On('task-deleted')]
    public function deleteTask(array $data)
    {
        //This would be place to do some authorization before deleting
        $deletedTaskListId = $data['list_id'];
        $deletedTaskId = $data['task_id'];
        foreach ($this->taskLists as &$taskList) {
            if ($taskList['id'] === $deletedTaskListId) {
                // find task in array and swap out with updated info
                foreach ($taskList['tasks'] as $index => $task) {
                    if ($task['id'] === $deletedTaskId) {
                        unset($taskList['tasks'][$index]);
                        return;
                    }
                }
                return;
            }
        }
    }


    #[On('show-edit-modal')]
    public function showEditModal(Task $task)
    {
        $this->selectedTaskId = $task->id;
        $this->state = 'edit-task';
        $this->dispatch('open-modal', 'edit-task');
    }

    #[On('show-add-modal')]
    public function showAddTaskModal($taskListId)
    {
        $this->selectedListId = $taskListId;
        $this->dispatch('open-modal', 'add-task');
    }

    #[On('show-delete-modal')]
    public function showDeleteTaskListModal($taskListId)
    {
        $this->selectedListId = $taskListId;
        $this->dispatch('open-modal', 'delete-task');
    }

    public function sortTasks(Task $task, $position, $currentTaskListId)
    {
        $task->update(['position' => $position, 'task_list_id' => $currentTaskListId]);

        $currentListTasks = Task::where('task_list_id', $currentTaskListId)
            ->where('id', '!=', $task->id)
            ->orderBy('position')
            ->get();

        // place the moved task into the new position
        $currentListTasks->splice($position, 0, [$task]);

        // Update position of the remaining tasks to respect added task
        foreach ($currentListTasks as $index => $task) {
            $data = ['position' => $position = $index + 1];
            $min = 0;
            $max = 3;

            //auto-set first 3 task as high priority
            //users should also be allowed to set this manually
            if ($position >= $min && $position <= $max) {
                $data['priority'] = TaskPriority::HIGH;
            }

            $task->update($data);
        }
    }

    public function render()
    {
        return view('livewire.task-boards.task-list');
    }
}
