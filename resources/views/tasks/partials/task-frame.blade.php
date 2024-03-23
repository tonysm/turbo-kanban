<x-turbo::frame :id="[$task, 'frame']">
    @include('tasks.partials.task', ['task' => $task])
</x-turbo::frame>
