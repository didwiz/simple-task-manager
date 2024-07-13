<?php

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component {
    public string $name = '';
    public Project $project;

    /**
     * Update the password for the currently authenticated user.
     */
    public function createTaskList(): void
    {
        try {
            $validated = $this->validate([
                'name' => ['required', 'string'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('name');
            throw $e;
        }

        $this->project->taskLists()->create([
            'name' => $this->name,
            'position' => 0,
        ]);

        $this->reset('name');
        $this->dispatch('list-created');
        $this->closeForm();
    }

    public function closeForm(){
        $this->dispatch('close-form');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Create Task List') }}
        </h2>
    </header>

    <form wire:submit="createTaskList" class="mt-6 space-y-6">
        <div>
            <x-input-label for="list_name" :value="__('List Name')" />
            <x-text-input wire:model="name" class="block w-full mt-1" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between gap-4">
            <div>
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                <x-action-message class="mr-3" on="list-created">
                    {{ __('Saved.') }}
                </x-action-message>
            </div>
            <div>
                <x-secondary-button wire:click='closeForm'>{{ __('Cancel') }}</x-secondary-button>
            </div>
        </div>
    </form>
</section>
