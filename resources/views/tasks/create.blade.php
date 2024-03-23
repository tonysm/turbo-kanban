<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex space-x-4 max-w-7xl mx-auto overflow-x-auto sm:px-6 lg:px-8">
            <x-turbo::frame :id="[$board, 'create_task']" target="_top">
                <form action="{{ route('boards.tasks.store', $board) }}" method="post" data-controller="form" data-action="keydown.esc->form#cancel turbo:submit-end->form#resetIfFrameSubmitWasSuccessful focus->form#noop:stop focusleave->form#cancel">
                    @csrf

                    <div class="mb-2">
                        <textarea name="title" cols="30" rows="2" class="w-full rounded-lg bg-transparent shadow" autofocus data-action="keydown.enter->form#submit:prevent"></textarea>
                    </div>

                    <a data-form-target="cancel" href="{{ route('boards.tasks.index', $board) }}" class="sr-only" tabindex="-1">{{ __('Cancel') }}</a>
                    <x-primary-button type="submit">{{ __('Save') }}</x-primary-button>
                </form>
            </x-turbo::frame>
        </div>
    </div>
</x-app-layout>
