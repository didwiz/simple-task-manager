<div x-data="{ showMessage: false, message: {} }" @notify.window="message=event.detail; showMessage=true;">
    <div x-cloak x-show="showMessage" x-init="showMessage == true ? setTimeout(() => showMessage = false, 3000) : ''"
        class="flex items-center px-5 py-6 space-x-3 transition duration-200 bg-white border border-gray-100 shadow-xl rounded-xl sm:items-start w-30"
        x-transition:enter-start="opacity-0" x-transition:leave-end="opacity-0">
        <div class="">
            <div x-show="message.type=='success'">
                <x-heroicon-s-check-circle class="w-6 h-6 text-emerald-500" />
            </div>

            <div x-show="message.type=='success'">
                <x-heroicon-s-exclamation-circle class="w-6 h-6 text-red-600" />
            </div>

            <div x-show="message.type=='info'">
                <x-heroicon-s-exclamation-circle class="w-6 h-6 text-blue-500" />
            </div>
        </div>

        <div class="flex flex-col">
            <h4 x-text="message.title" class="font-semibold text-blue-600">
            </h4>
            <p x-text="message.body"
                class="flex flex-wrap w-full mt-1 text-base font-medium prose text-gray-500 sm:w-4/5">
            </p>
        </div>

        <div x-on:click="showMessage=false" class="text-gray-500 cursor-pointer font-extralight hover:underline">
            Close
        </div>

    </div>
</div>
