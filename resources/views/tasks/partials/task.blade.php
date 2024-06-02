<div id="task_{{ $task->client_id }}" class="relative hover:ring-2 focus:ring-2 focus-within:ring-2 ring-indigo-500 dark:ring-indigo-600 rounded-lg my-2 sm:rounded-lg bg-gray-100 dark:bg-gray-900 dark:text-white">
    @include('tasks-title.partials.title-frame', ['task' => $task])
</div>
