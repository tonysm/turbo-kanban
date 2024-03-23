<x-turbo::frame :id="[$board, 'create_task']" class="block p-1 rounded-lg text-gray-400">
    <a href="{{ route('boards.tasks.create', $board) }}" class="flex items-center space-x-2">
        <x-icons.plus />
        <span>{{ __('Add task') }}</span>
    </a>
</x-turbo::frame>
