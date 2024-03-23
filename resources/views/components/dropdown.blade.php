@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white dark:bg-gray-700'])

@php
switch ($align) {
    case 'left':
        $alignmentClasses = 'ltr:origin-top-left rtl:origin-top-right start-0';
        break;
    case 'top':
        $alignmentClasses = 'origin-top';
        break;
    case 'right':
    default:
        $alignmentClasses = 'ltr:origin-top-right rtl:origin-top-left end-0';
        break;
}

switch ($width) {
    case '48':
        $width = 'w-48';
        break;
}
@endphp

<div class="relative" data-controller="dropdown" data-action="turbo:before-cache@window->dropdown#closeNow click@window->dropdown#closeWhenClickedOutside close->dropdown#close:stop">
    <div data-action="click->dropdown#toggle">
        {{ $trigger }}
    </div>

    <div
        data-dropdown-target="content"
        data-action="click->dropdown#close"
        data-transition-enter="transition ease-out duration-200"
        data-transition-enter-start="opacity-0 scale-95"
        data-transition-enter-end="opacity-100 scale-100"
        data-transition-leave="transition ease-in duration-75"
        data-transition-leave-start="opacity-100 scale-100"
        data-transition-leave-end="opacity-0 scale-95"
        class="hidden absolute z-50 mt-2 {{ $width }} rounded-md shadow-lg {{ $alignmentClasses }}"
    >
        <div class="rounded-md ring-1 ring-black ring-opacity-5 {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>
