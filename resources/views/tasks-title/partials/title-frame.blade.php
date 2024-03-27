<x-turbo::frame :id="[$task, 'title-frame']" class="block flex-1 group">
    @include('tasks-title.partials.title', ['task' => $task])
</x-turbo::frame>
