<div x-on:click="$dispatch('show-edit-modal',[task.id])"
    class="flex flex-col px-5 py-4 my-5 mt-1 bg-white rounded-lg shadow cursor-pointer hover:border hover:border-gray-500">
    <div class="flex items-center justify-between text-lg font-medium">
        <span x-text="task.name">
        </span>
        <x-heroicon-o-pencil-square class="w-5 h-5 text-gray-500 cursor-pointer" />
    </div>
    <p x-text="task.description" class="text-base text-gray-600 line-clamp-2">
    </p>

    <div x-show="task.due_date" class="flex items-center justify-between mt-5 text-sm">
        <div class="flex items-center space-x-2 text-gray-500">
            <x-heroicon-o-calendar-days class="w-5 h-5" />
            <span x-text="task.due_date">
            </span>
        </div>
        <div x-text="task.priority" class="px-3 py-1 text-xs font-medium text-gray-500 capitalize border rounded-full"></div>
    </div>
</div>
