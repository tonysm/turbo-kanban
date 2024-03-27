<x-turbo::frame :id="[$board, 'frame']" class="flex-shrink-0 w-full max-w-sm block dark:text-white">
    @include('boards.partials.board', ['board' => $board])
</x-turbo::frame>
