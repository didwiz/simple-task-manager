<div x-data x-sort:item class="flex flex-col px-5 py-4 my-5 mt-1 bg-white rounded-lg shadow">
    <div class="flex items-center justify-between text-lg font-medium">
        <span>
            {{$task->name}}
        </span>
    <x-heroicon-o-pencil-square wire:click="editTask({{$task->id}})" class="w-5 h-5 text-gray-500 cursor-pointer"/>
    </div>
    <p class="mt-2 text-gray-600 line-clamp-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
        Explicabo est fugit enim quia veniam! Earum veritatis molestiae sapiente ab deserunt, culpa
        voluptates, maiores corporis doloremque ex voluptatem numquam quis quo.
    </p>

    <div class="flex items-center justify-between mt-5">
        <div class="flex items-center space-x-2 text-gray-500">
            <x-heroicon-o-calendar-days class="w-5 h-5" />
            <span>
                21/02/2024
            </span>
        </div>
    </div>
</div>
