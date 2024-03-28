<x-turbo::frame :id="[$board, 'create_task']" data-turbo-permanent class="block mt-2">
    <a href="{{ route('boards.tasks.create', $board) }}" class="flex px-1 py-2 rounded-lg text-gray-400 items-center space-x-2 outline-none focus:ring-2 ring-indigo-500 dark:ring-indigo-600">
        <x-icons.plus />
        <span>{{ __('Add task') }}</span>
    </a>
</x-turbo::frame>
