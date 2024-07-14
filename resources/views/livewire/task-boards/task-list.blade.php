<div>
    <div class="md:flex md:items-center md:justify-between">
        <div class="flex flex-1 min-w-0 gap-4">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                {{ $project->name }}
            </h2>
        </div>
        <div class="flex gap-3 mt-4 md:ml-4 md:mt-0">
            <x-secondary-button>{{ __('Edit') }}</x-secondary-button>
            <x-primary-button wire:click="addTask(0)">{{ __('Add Task') }}</x-primary-button>
        </div>
    </div>

    <div class="h-screen mt-8 overflow-x-auto">
        <div class="grid grid-flow-col auto-cols-[20rem] gap-4">
            @forelse($project->taskLists as $taskList)
                <div class="" wire:key="{{ $taskList->id }}">
                    <div class="flex flex-col p-2 border rounded-lg bg-gray-50" style="min-height:8rem;">
                        <div class="w-full">
                            <button class="flex justify-end w-full">
                                <x-heroicon-o-x-circle class="text-gray-500 w-7 h-7 hover:text-gray-800" />
                            </button>
                            <h3 class="flex items-center justify-between p-4 font-medium text-gray-500">
                                <div>
                                    <span class="font-semibold text-gray-600 capitalize">{{ $taskList->name }}</span>
                                    [{{ $taskList->tasks->count() }}]
                                </div>
                                <button wire:click="addTask('{{ $taskList->id }}')"
                                    class="p-2 text-sm rounded hover:border hover:border-gray-500">
                                    Add Task
                                </button>
                            </h3>

                        </div>

                        <ul x-sort x-sort:group="{{ $project->id }}">
                            @foreach ($taskList->tasks as $task)
                                <livewire:task-boards.task :task="$task" wire:key="{{ $task->uuid }}" />
                            @endforeach
                        </ul>
                    </div>
                </div>
            @empty
                <x-add-task-list :project="$project" />
            @endforelse

            @if ($project->taskLists->isNotEmpty())
                <div>
                    <x-add-task-list :project="$project" />
                </div>
            @endif
        </div>
    </div>

    <div>
        <x-modal name="add-task" focusable>
            <livewire:task-boards.create-task :projectId="$project->id" :selectedListId="$selectedListId" :key="$project->uuid" />
        </x-modal>

        @if ($state === 'edit-task')
            <x-modal name="edit-task" show="false" focusable>
                <livewire:task-boards.edit-task :projectId="$project->id" :selectedListId="$selectedListId" :selectedTaskId="$selectedTaskId"
                    :key="$selectedTaskId" />
            </x-modal>
        @endif
    </div>
</div>
