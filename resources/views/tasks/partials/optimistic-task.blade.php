<template data-task-form-target="template">
    <div id="frame_task_$clientId$" class="relative group border-2 border-transparent hover:ring-2 focus:ring-2 focus-within:ring-2 ring-indigo-500 dark:ring-indigo-600 rounded-lg my-2 sm:rounded-lg bg-gray-100 dark:bg-gray-900 dark:text-white data-[failed]:border-2 data-[failed]:border-red-400" data-pending>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden group-data-[failed]:block size-6 absolute top-2 right-2 text-red-400">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
        </svg>

        <span class="block p-4 opacity-40 focus:ring-0 hover:ring-0 hover:outline-none active:ring-0 focus:outline-none whitespace-pre-wrap">$body$</span>
    </div>
</template>
