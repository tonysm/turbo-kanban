@props(['status'])

@if ($status)
    <div data-turbo-temporary {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600 dark:text-green-400']) }}>
        {{ $status }}
    </div>
@endif
