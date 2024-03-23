<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div id="boards" class="flex space-x-4 max-w-7xl mx-auto overflow-x-auto sm:px-6 lg:px-8">
            @foreach ($boards as $board)
                @include('boards.partials.turbo-frame-board', ['board' => $board])
            @endforeach

            @include('boards.partials.new-board')
        </div>
    </div>
</x-app-layout>
