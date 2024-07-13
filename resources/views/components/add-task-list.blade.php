<div x-data="{ state: @entangle('state') }" class="p-2 border rounded-lg bg-gray-50">
    <button x-on:click="state='add-new-list'" x-show="state != 'add-new-list'"
        class="flex items-center p-4 font-medium text-gray-600">
        <x-heroicon-s-plus-circle class="w-5 h-5 mr-2" />
        <span class="text-sm uppercase">
            Add a new list
        </span>
    </button>
    <div x-show="state=='add-new-list'" class="px-2 py-3">
        <livewire:task-boards.create-task-list :project="$project" wire:key="{{ $project->uuid }}" />
    </div>
</div>
