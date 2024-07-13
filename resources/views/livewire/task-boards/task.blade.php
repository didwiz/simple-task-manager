<div x-data x-sort:item wire:click="$parent.editTask({{ $task->id }}, {{ $task->task_list_id }})"
    class="flex flex-col px-5 py-4 my-5 mt-1 bg-white rounded-lg shadow cursor-pointer hover:border hover:border-gray-500">
    <div class="flex items-center justify-between text-lg font-medium">
        <span>
            {{ $task->name }}
        </span>
        <x-heroicon-o-pencil-square class="w-5 h-5 text-gray-500 cursor-pointer" />
    </div>
    <p class="text-base text-gray-600 line-clamp-2">
        {{ $task->description }}
    </p>

    @if ($task->due_date)
        <div class="flex items-center justify-between mt-5 text-sm">
            <div class="flex items-center space-x-2 text-gray-500">
                <x-heroicon-o-calendar-days class="w-5 h-5" />
                <span>
                    {{ $task->due_date->format('d/m/Y') }}
                </span>
            </div>
        </div>
    @endif
</div>
