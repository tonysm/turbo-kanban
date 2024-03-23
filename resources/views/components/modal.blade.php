@props([
    'id',
    'show' => false,
    'maxWidth' => '2xl'
])

@php
$maxWidth = [
    'sm' => 'sm:max-w-sm',
    'md' => 'sm:max-w-md',
    'lg' => 'sm:max-w-lg',
    'xl' => 'sm:max-w-xl',
    '2xl' => 'sm:max-w-2xl',
][$maxWidth];
@endphp

<div
    id="{{ $id }}"
    data-controller="modal"
    data-modal-open-value="@js($show)"
    data-modal-focusable-value="@js($attributes->has('focusable'))"
    data-action="
        turbo:before-cache@window->modal#closeNow
        open-modal@window->modal#openWhenIdMatches
        close->modal#close:stop
        keydown.esc@window->modal#close
        keydown.tab->modal#changeFocus:prevent
        keydown.shift+tab->modal#changeFocus:prevent
    "
    class="hidden fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
>
    <div
        data-modal-target="overlay"
        data-action="click->modal#close"
        class="hidden fixed inset-0 transform transition-all"
        data-transition-enter="ease-out duration-300"
        data-transition-enter-start="opacity-0"
        data-transition-enter-end="opacity-100"
        data-transition-leave="ease-in duration-200"
        data-transition-leave-start="opacity-100"
        data-transition-leave-end="opacity-0"
    >
        <div class="absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-75"></div>
    </div>

    <div
        data-modal-target="content"
        class="hidden mb-6 bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full {{ $maxWidth }} sm:mx-auto"
        data-transition-enter="ease-out duration-300"
        data-transition-enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        data-transition-enter-end="opacity-100 translate-y-0 sm:scale-100"
        data-transition-leave="ease-in duration-200"
        data-transition-leave-start="opacity-100 translate-y-0 sm:scale-100"
        data-transition-leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    >
        {{ $slot }}
    </div>
</div>
