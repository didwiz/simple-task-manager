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

    <div x-data="{
        taskLists: $wire.entangle('taskLists'),
        selectedListId: $wire.entangle('selectedListId').live,
        selectedTaskId: $wire.entangle('selectedTaskId').live,
        sortTasks: function(taskId, position, currentListId) {
            console.log(taskId, position, currentListId)
            $wire.sortTasks(taskId, position, currentListId);
        },
        sortLists: function(item, position) {
            console.log(item, position);
            $wire.sortLists(item, position);
        }
    }" wire:ignore class="h-screen mt-8 overflow-x-auto">
        <div class="flex items-start h-screen gap-4 overflow-x-auto">
            <div x-sort="sortLists" x-sort:group="list" class="grid grid-flow-col auto-cols-[20rem] gap-4">
                <template x-show="taskLists.length" x-for="(taskList,index) in taskLists" :key="'list-' + taskList.id"
                    wire:key="'list-' + taskList.id">
                    <div x-sort:item="taskList.id" class="">
                        <div class="flex flex-col p-2 border rounded-lg bg-gray-50" style="min-height:8rem;">
                            <div class="w-full">
                                <button x-on:click="$wire.deleteTaskList(taskList.id)" class="flex justify-end w-full">
                                    <x-heroicon-o-x-circle class="text-gray-500 w-7 h-7 hover:text-gray-800" />
                                </button>
                                <h3 class="flex items-center justify-between p-4 font-medium text-gray-500">
                                    <div>
                                        <span x-text="taskList.name"
                                            class="font-semibold text-gray-600 capitalize"></span>
                                        <span x-text="taskList?.tasks?.length ?? 0"></span>
                                    </div>
                                    <button x-on:click="$wire.showAddTaskModal(taskList.id)"
                                        class="p-2 text-sm rounded hover:border hover:border-gray-500">
                                        Add Task
                                    </button>
                                </h3>

                            </div>

                            <ul x-sort
                                x-sort:config="{ onEnd: (event) => {
                                    let taskId = event.item.getAttribute('data-task-id');
                                    let currentListId = event.to.closest('[data-task-list-id]').getAttribute('data-task-list-id');

                                    event.item.style.opacity = '1'

                                    sortTasks(taskId, event.newIndex, currentListId);
                            }}"
                                x-sort:group="tasks" :data-task-list-id="taskList.id">
                                <template x-for="task in taskList.tasks" :key="'li-' + task.id">
                                    <li x-sort:item="task.id" :data-task-id="task.id">
                                        <x-task-card />
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>
                </template>
            </div>
            <div wire:ignore class="grid grid-flow-col auto-cols-[20rem] gap-4">
                <x-add-task-list :project="$project" wire:key="add-list" />
            </div>
        </div>
    </div>

    {{-- modals --}}
    <div>
        <x-modal name="add-task" focusable wire:key="add-task">
            <livewire:task-boards.create-task :projectId="$project->id" :selectedListId="$selectedListId" :key="$project->uuid" />
        </x-modal>

        @if ($state === 'edit-task')
            <x-modal name="edit-task" show="false" focusable wire:key="edit-task">
                <livewire:task-boards.edit-task :selectedTaskId="$selectedTaskId" :key="$selectedTaskId" />
            </x-modal>
        @endif
    </div>
    @push('scripts')
        <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/sort@3.x.x/dist/cdn.min.js"></script>
    @endpush
</div>
