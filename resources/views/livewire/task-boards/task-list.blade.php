<div x-data="{ selectedListId: @entangle('selectedListId') }">
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

    <div>
        @if ($state === 'open-modal')
            <x-modal name="add-task" :show="$state === 'open-modal'" focusable>
                <livewire:task-boards.create-task projectId="{{ $project->id }}"
                    selectedListId="{{ $selectedListId }}" />
            </x-modal>
        @endif
    </div>

    <div class="h-screen mt-8 overflow-x-auto">
        <div class="grid grid-flow-col auto-cols-[20rem] gap-4">
            @forelse($project->taskLists as $taskList)
                <div class="">
                    <div class="flex flex-col p-2 border rounded-lg bg-gray-50" wire:key="{{ $taskList->id }}"
                        style="min-height:8rem;">
                        <h3 class="flex items-center justify-between p-4 font-medium text-gray-500">
                            <div>
                                {{ $taskList->name }} [{{ $taskList->tasks->count() }}]
                            </div>
                            <button x-on:click="selectedListId={{ $taskList->id }}"
                                wire:click="addTask('{{ $taskList->id }}')"
                                class="p-2 text-sm rounded hover:border hover:border-gray-500">
                                Add Task
                            </button>
                        </h3>

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

</div>
