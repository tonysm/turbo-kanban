<form
    id="@domid($board, 'create_task')"
    action="{{ route('boards.tasks.store', $board) }}"
    method="post"
    data-turbo-frame="_top"
    data-controller="form autogrow"
    data-action="
        keydown.esc->form#cancel
        focus->form#noop:stop
        focusleave->form#cancel
        turbo:submit-failed-async->task-form#markPendingAsFailed
    "
>
    @csrf

    @include('tasks.partials.optimistic-task')

    <input data-task-form-target="clientId" type="hidden" name="client_id" value="{{ Str::uuid() }}" />

    <div class="mb-2">
        <x-textarea-input
            name="title"
            cols="30"
            rows="2"
            class="w-full rounded-lg bg-transparent shadow"
            autofocus
            data-task-form-target="text"
            data-autogrow-target="textarea"
            data-action="keydown.enter->task-form#submitByKeyboard:prevent"
        />
    </div>

    <div class="flex items-center space-x-1">
        <x-primary-button type="submit" data-action="task-form#optimisticSubmit:prevent">{{ __('Save') }}</x-primary-button>

        <a data-form-target="cancel" href="{{ route('boards.tasks.index', $board) }}" class="p-2 text-base transition rounded-lg hover:bg-gray-900 focus:bg-gray-900 outline-none focus:ring-2 ring-indigo-500 dark:ring-indigo-600">
            <x-icons.x-mark class="w-4 h-4 dark:text-white" />
            <span class="sr-only">{{ __('Cancel') }}</span>
        </a>
    </div>
</form>
