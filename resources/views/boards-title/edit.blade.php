<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Change Board Title') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex space-x-4 max-w-7xl mx-auto overflow-x-auto sm:px-6 lg:px-8">
            <x-turbo::frame :id="[$board, 'title']" class="block flex-1 group">
                <form action="{{ route('boards.title.update', $board) }}" method="post" data-controller="form" data-action="keydown.esc->form#cancel">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-text-input :id="dom_id($board, 'title_field')" class="block w-full" type="text" name="title" :value="old('title', $board->title)" required autofocus autocomplete="off" />
                    </div>

                    <a data-form-target="cancel" href="{{ route('boards.title.show', $board) }}" class="sr-only">{{ __('Cancel') }}</a>
                    <button type="submit" class="sr-only">{{ __('Save') }}</button>
                </form>
            </x-turbo::frame>
        </div>
    </div>
</x-app-layout>
