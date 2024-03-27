<form action="{{ route('boards.tasks.store', $board) }}" method="post" data-controller="form textarea-autogrow" data-action="keydown.esc->form#cancel turbo:submit-end->form#resetIfFrameSubmitWasSuccessful turbo:submit-end->textarea-autogrow#resetIfSubmitSuccessful focus->form#noop:stop focusleave->form#cancel">
    @csrf

    <div class="mb-2">
        <x-textarea-input data-textarea-autogrow-target="textarea" name="title" cols="30" rows="2" class="w-full rounded-lg bg-transparent shadow" autofocus data-action="keydown.enter->form#submit:prevent" />
    </div>

    <div class="flex items-center space-x-1">
        <x-primary-button type="submit">{{ __('Save') }}</x-primary-button>
        <a data-form-target="cancel" href="{{ route('boards.tasks.index', $board) }}" class="p-2 text-base transition rounded-lg hover:bg-gray-900 focus:bg-gray-900 outline-none focus:ring-2 ring-indigo-500 dark:ring-indigo-600">
            <x-icons.x-mark class="w-4 h-4 dark:text-white" />
            <span class="sr-only">{{ __('Cancel') }}</span>
        </a>
    </div>
</form>
