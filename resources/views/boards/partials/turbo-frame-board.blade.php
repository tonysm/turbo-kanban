<x-turbo::frame :id="[$board, 'frame']" :src="route('boards.show', $board)" loading="lazy" class="flex-shrink-0 w-full max-w-sm block dark:text-white">
    <div class="flex items-start justify-between p-4 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
        <span class="text-transparent bg-gray-100">{{ __('Loading...') }}</span>
    </div>
</x-turbo::frame>
