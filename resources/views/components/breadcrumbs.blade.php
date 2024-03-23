@props(['links' => []])

<div class="flex items-center space-x-1">
    @foreach ($links as $link => $text)
        @if (is_string($link))
            <a href="{{ $link }}" class="underline underline-offset-4">{{ $text }}</a>
        @else
            <span>{{ $text }}</span>
        @endif

        @if (! $loop->last)
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        @endif
    @endforeach
</div>
