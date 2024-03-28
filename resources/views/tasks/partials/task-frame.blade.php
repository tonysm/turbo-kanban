<x-turbo::frame :id="[$task, 'frame']" class="block" data-sortable-id="{{ $task->id }}">
    @include('tasks.partials.task', ['task' => $task])
</x-turbo::frame>
