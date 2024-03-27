<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex space-x-4 max-w-7xl mx-auto overflow-x-auto sm:px-6 lg:px-8">
            <x-turbo::frame :id="[$board, 'create_task']" target="_top">
                @include('tasks.partials.form', ['board' => $board])
            </x-turbo::frame>
        </div>
    </div>
</x-app-layout>
