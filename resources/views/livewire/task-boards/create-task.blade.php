<div x-cloak class="px-6 py-4 mt-4">
    <form wire:submit='save'>
        <div class="space-y-12">
            <div class="grid grid-cols-1 pb-12 border-b gap-x-8 gap-y-10 border-gray-900/10 md:grid-cols-3">
                <div>
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Create Task</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Provide required information about this task.</p>
                </div>

                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
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
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Position on
                            List</label>
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
            <button type="button" x-data x-on:click="$dispatch('close');" class="px-3 py-2 text-sm font-semibold leading-6 text-gray-900 hover:border hover:rounded-md">Cancel</button>
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
