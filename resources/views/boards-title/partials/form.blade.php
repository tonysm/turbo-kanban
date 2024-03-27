<form action="{{ route('boards.title.update', $board) }}" method="post" data-controller="form" data-action="keydown.esc->form#cancel">
    @csrf
    @method('PUT')

    <div>
        <x-text-input :id="dom_id($board, 'title_field')" class="block w-full" type="text" name="title" :value="old('title', $board->title)" required autofocus autocomplete="off" />
    </div>

    <a data-form-target="cancel" href="{{ route('boards.title.show', $board) }}" class="sr-only">{{ __('Cancel') }}</a>
    <button type="submit" class="sr-only">{{ __('Save') }}</button>
</form>
