@php
    $projects = \App\Models\Project::latest()
        ->get()
        ->map(function ($project) {
            return [
                'uuid' => $project->uuid,
                'name' => $project->name,
            ];
        })
        ->toArray();
@endphp

<div class="relative inline-block text-left" x-data="{
    showDropDown: false,
    projects: @js($projects),
}">
    <div>
        <button type="button" x-on:click="showDropDown=!showDropDown"
            class="inline-flex items-center w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
            id="menu-button" aria-expanded="true" aria-haspopup="true">
            <x-heroicon-o-folder-open class="w-5 h-5" />
            <span>
                Projects
            </span>
            <x-heroicon-o-chevron-down class="w-4 h-4 -mr-1 text-gray-400" />
        </button>
    </div>

    <div x-show="showDropDown" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
        class="absolute left-0 z-10 w-[20rem] mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
        <div class="py-1" role="none">
            <template x-for="project in projects" :key="project.uuid">
                <a x-bind:href="'/projects/'+project.uuid+'/tasks'"
                    class="flex items-center w-full px-4 py-2 text-sm font-medium text-gray-800 hover:bg-gray-100"
                    role="menuitem" tabindex="-1" id="menu-item-0">
                    <div class="w-1/12">
                        <x-heroicon-o-folder class="w-5 h-5 mr-1" />
                    </div>
                    <span x-text="project.name" class="truncate"></span>
                </a>
            </template>
        </div>
    </div>
</div>
