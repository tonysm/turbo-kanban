<x-app-layout>
    <x-slot name="meta">
        <x-turbo::refreshes-with method="morph" scroll="preserve" />
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-turbo::stream-from source="boards" />

    @foreach ($boards as $board)
        <x-turbo::stream-from :source="$board" />
    @endforeach

    <div class="py-12">
        <div class="flex space-x-4 w-full mx-auto sm:px-6 lg:px-8">
            <div id="boards" data-controller="sortable" data-sortable-url-value="{{ route('boards.order.update', ['board' => ':item_id']) }}" data-sortable-group-name-value="boards" class="flex flex-1 w-full space-x-4 overflow-x-auto">
                @each('boards.partials.board', $boards, 'board')
            </div>

            @include('boards.partials.new-board')
        </div>
    </div>
</x-app-layout>
