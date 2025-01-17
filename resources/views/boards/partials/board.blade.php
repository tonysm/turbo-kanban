<div id="{{ dom_id($board) }}" data-sortable-id="{{ $board->id }}" class="flex-shrink-0 w-full max-w-sm">
    <div class="dark:text-white p-4 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
        <div class="flex items-start justify-between space-x-2">
            <x-turbo::frame :id="[$board, 'title']" class="block flex-1 group">
                @if ($board->wasRecentlyCreated)
                    @include('boards-title.partials.form', ['board' => $board])
                @else
                    @include('boards-title.partials.title', ['board' => $board])
                @endif
            </x-turbo::frame>

            <form action="{{ route('boards.destroy', $board) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="p-2 rounded-lg translation hover:bg-gray-100 dark:hover:bg-gray-900 text-white outline-none focus:ring-2 hover:ring-2 ring-indigo-500 dark:ring-indigo-600">
                    <x-icons.ellipsis-horizontal />
                    <span class="sr-only">{{ __('Options') }}</span>
                </button>
            </form>
        </div>

        <div id="{{ dom_id($board, 'tasks') }}" data-controller="sortable" data-sortable-parent-id="{{ $board->id }}" data-sortable-url-value="{{ route('tasks.order.update', ['task' => ':item_id']) }}" data-sortable-group-name-value="tasks">
            @each('tasks.partials.task-frame', $board->tasks, 'task')
        </div>

        @include('tasks.partials.new-task')
    </div>
</div>
