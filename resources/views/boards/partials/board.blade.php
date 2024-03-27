<div id="{{ dom_id($board) }}" class="w-full p-4 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
    <div class="flex items-start justify-between space-x-2">
        <x-turbo::frame :id="[$board, 'title']" class="block flex-1 group">
            @include('boards-title.partials.title', ['board' => $board])
        </x-turbo::frame>

        <form action="{{ route('boards.destroy', $board) }}" method="post">
            @csrf
            @method('DELETE')

            <button type="submit" class="p-2 rounded-lg bg-gray-100 dark:bg-gray-900 text-white outline-none focus:ring-2 hover:ring-2 ring-indigo-500 dark:ring-indigo-600">
                <x-icons.ellipsis-vertical />
                <span class="sr-only">{{ __('Options') }}</span>
            </button>
        </form>
    </div>

    <div :id="[$board, 'tasks']">
        @each('tasks.partials.task-frame', $board->tasks, 'task')
        @include('tasks.partials.new-task')
    </div>
</div>
