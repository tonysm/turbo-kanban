<x-turbo::frame id="frame_task_{{ $task->client_id }}" class="block" data-sortable-id="{{ $task->id }}">
    @include('tasks.partials.task', ['task' => $task])
</x-turbo::frame>
