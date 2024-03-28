<div>
    <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
        <form action="{{ route('boards.store') }}" method="post" class="flex p-1 items-center justify-center">
            @csrf
            <button type="submit" class="p-3 block rounded-lg dark:text-white outline-none focus:ring-2 hover:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                <x-icons.plus />
                <span class="sr-only">Add Board</span>
            </button>
        </form>
    </div>
</div>
