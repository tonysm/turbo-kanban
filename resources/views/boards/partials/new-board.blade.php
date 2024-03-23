<x-turbo::frame id="create_board">
    <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
        <form action="{{ route('boards.store') }}" method="post" class="flex items-center justify-center">
            @csrf
            <button type="submit" class="p-4 block dark:text-white">
                <x-icons.plus />
                <span class="sr-only">Add Board</span>
            </button>
        </form>
    </div>
</x-turbo::frame>
