<x-turbo::frame :id="[$task, 'frame']" class="contents">
    @include('tasks.partials.task', ['task' => $task])
</x-turbo::frame>
