<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile & Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div
                class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg space-y-6 [&>a]:first-of-type:[&_li]:rounded-t-lg [&>button]:first-of-type:[&_li]:rounded-t-lg [&>a]:last-of-type:[&_li]:rounded-b-lg [&>button]:last-of-type:[&_li]:rounded-b-lg">
                <ul class="bg-gray-100 dark:bg-gray-700 rounded-lg divide-y dark:divide-gray-600">
                    <li>
                        <a href="{{ route('profile.edit') }}"
                            class="flex items-center space-x-2 w-full p-4 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="flex-1">{{ __('Edit Profile') }}</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('profile.password.edit') }}"
                            class="flex items-center space-x-2 w-full p-4 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                            </svg>
                            <span class="flex-1">{{ __('Change Password') }}</span>
                        </a>
                    </li>
                </ul>

                <ul class="bg-gray-100 dark:bg-gray-700 rounded-lg divide-y dark:divide-gray-600">
                    <li>
                        <a href="{{ route('profile.delete') }}"
                            class="flex items-center space-x-2 w-full p-4 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                            <span class="flex-1">{{ __('Delete Account') }}</span>
                        </a>
                    </li>
                </ul>

                <ul class="bg-gray-100 dark:bg-gray-700 rounded-lg divide-y dark:divide-gray-600">
                    <li>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="flex items-center space-x-2 w-full p-4 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                </svg>
                                <span class="flex-1">{{ __('Log Out') }}</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
