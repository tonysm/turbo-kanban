<form action="{{ route('tasks.title.update', $task) }}" method="post" data-controller="form textarea-autogrow" data-action="keydown.esc->form#cancel turbo:submit-end->form#resetIfFrameSubmitWasSuccessful focus->form#noop:stop focusleave->form#cancel">
    @csrf
    @method('PUT')

    <div class="mb-2">
        <x-textarea-input data-textarea-autogrow-target="textarea" name="title" cols="30" rows="1" class="w-full p-4 rounded-lg bg-transparent border-0 ring-0 focus:ring-0 focus:border-0 hover:ring-0 shadow" autofocus data-action="keydown.enter->form#submitFromKeyboard:prevent keydown.tab->form#cancel" :value="$task->title" />
    </div>

    <a data-form-target="cancel" href="{{ route('tasks.title.show', $task) }}" class="sr-only" tabindex="-1">{{ __('Cancel') }}</a>
    <x-primary-button class="sr-only" type="submit">{{ __('Save') }}</x-primary-button>
</form>
