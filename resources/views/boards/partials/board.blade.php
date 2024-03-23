<div id="{{ dom_id($board) }}" class="w-full">
    <div class="flex items-start justify-between space-x-2">
        <x-turbo::frame :id="[$board, 'title']" class="block flex-1 group">
            @include('boards-title.partials.title', ['board' => $board])
        </x-turbo::frame>

        <form action="{{ route('boards.destroy', $board) }}" method="post">
            @csrf
            @method('DELETE')

            <button type="submit" class="p-2 rounded-lg bg-gray-100 dark:bg-gray-900 text-white">
                <x-icons.ellipsis-vertical />
                <span class="sr-only">{{ __('Options') }}</span>
            </button>
        </form>
    </div>

    <x-turbo::frame :id="[$board, 'tasks']" :src="route('boards.tasks.index', $board)">
    </x-turbo::frame>
</div>
