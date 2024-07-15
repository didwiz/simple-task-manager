<div x-data="{
    state: @entangle('state'),
}" class="px-6 py-4 mt-4">


    <div x-show="state!=='edit-form'">
        <div class="space-y-5">
            <header class="flex flex-col">
                <small class="text-gray-400">#{{ $task->project->name }}</small>
                <div class="flex flex-row justify-between mt-2">

                    <h2 class="text-xl font-bold">{{ $task->name }}</h2>
                    @if ($task->due_date)
                        <p><small class="text-gray-400 ">Due on</small> {{ $task->due_date->format('d/m/Y') }}</p>
                    @endif
                </div>
                <small class="text-sm ">In list: {{ $task->taskList->name }}</small>
                <small class="capitalize">{{ $task->priority }} Priority</small>
                <small class="capitalize">{{ $task->position }} Position</small>
            </header>

            @if ($task->description)
                <div>
                    <label class="text-gray-500">Description</label>
                    <div class="px-3 py-5 mt-1 border rounded-lg bg-gray-50">
                        <p class="text-gray-600">{{ $task->description }}</p>
                    </div>
                </div>
                @else
                <hr class="my-5">
            @endif
        </div>

        <div class="flex items-center justify-between mt-6 mb-5 gap-x-6">
            <x-danger-button wire:click="delete({{ $task->id }})" class="ms-3">
                {{ __('Delete') }}
            </x-danger-button>
            <button x-on:click="state='edit-form'"
                class="flex items-center px-3 py-2 text-sm font-semibold text-gray-600 bg-white border border-gray-500 rounded-md shadow-sm hover:text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                {{ __('EDIT') }}
                <div wire:loading wire:target="save" class="ml-2">
                    <x-spinner-icon class="w-5 h-5" />
                </div>
            </button>
        </div>
    </div>

    <form x-show="state==='edit-form'" wire:submit='save'>
        <div class="space-y-12">
            <div class="grid grid-cols-1 pb-12 border-b gap-x-8 gap-y-10 border-gray-900/10 md:grid-cols-3">

                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-6">
                    <div class="sm:col-span-6">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                        <div class="mt-2">
                            <div class="mt-2">
                                <x-text-input wire:model="form.name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                            <x-input-error :messages="$errors->get('form.name')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="desc"
                            class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                        <div class="mt-2">
                            <textarea wire:model="form.description" rows="3"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                            <x-input-error :messages="$errors->get('form.description')" class="mt-2" />

                        </div>
                        <p class="mt-3 text-sm leading-6 text-gray-600">Describe this task.</p>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Due Date<small
                                class="ml-2">(optional)</small></label>
                        <div class="mt-2">
                            <div class="mt-2">
                                <x-text-input wire:model="form.due_date" type="date"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                            <x-input-error :messages="$errors->get('form.due_date')" class="mt-2" />
                        </div>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">List
                            Position</label>
                        <div class="mt-2">
                            <div class="mt-2">
                                <x-text-input wire:model="form.position" type="number" min=1
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                            <x-input-error :messages="$errors->get('form.position')" class="mt-2" />
                        </div>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Priority</label>
                        <div class="mt-2">
                            <div class="mt-2">
                                <select wire:model="form.priority" class="rounded-lg">
                                    <option value="none">Select Task Priority</option>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                </select>
                            </div>
                            <x-input-error :messages="$errors->get('form.priority')" class="mt-2" />
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="flex items-center justify-between mt-6 gap-x-6">
            <button type="button" x-data x-on:click="$dispatch('close');"
                class="px-3 py-2 text-sm font-semibold leading-6 text-gray-900 hover:border hover:rounded-md">Cancel</button>
            <button type="submit"
                class="flex items-center px-3 py-1 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Save
                <div wire:loading wire:target="save" class="ml-2">
                    <x-spinner-icon class="w-5 h-5" />
                </div>
            </button>
        </div>
    </form>
</div>
