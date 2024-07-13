<div>
    <ul role="list" class="space-y-3">
        @forelse($projects as $project)
            <li class="flex justify-between px-6 py-4 overflow-hidden bg-white rounded-md shadow item-center">
                <!-- Your content -->
                <div class="">
                    <h1 class="text-xl font-bold">{{ $project->name }}</h1>
                    <p>{{ $project->description }}</p>
                </div>

                <a class="uppercase" href="{{route('projects.task-list',[$project->uuid])}}">View</a>
            </li>
        @empty
            <x-empty-state />
        @endforelse
    </ul>

</div>
