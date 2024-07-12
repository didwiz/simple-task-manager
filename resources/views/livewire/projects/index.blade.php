<div>
    <ul role="list" class="space-y-3">
        @forelse([] as $project)
            <li class="px-6 py-4 overflow-hidden bg-white rounded-md shadow">
                <!-- Your content -->
                {{ $project }}
                <div class="">
                    <h1>{{ $project->name }}</h1>

                    <p>{{ $project->description }}</p>

                </div>
            </li>
        @empty
            <x-empty-state />
        @endforelse
    </ul>

</div>
