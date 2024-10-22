<!-- navbar -->
<div class="py-1 px-6 bg-[#ffffff] flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
    <button type="button" class="text-lg text-gray-900 font-semibold sidebar-toggle">
        <i class="ri-menu-line"></i>
    </button>

    {{-- <div class="flex justify-center">
        <div class=" w-full text-white bg-gradient-to-r from-primary-400 via-primary-500 to-primary-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-primary-300 dark:focus:ring-primary-800 shadow-lg shadow-primary-500/50 dark:shadow-lg dark:shadow-primary-800/80 font-medium rounded-lg text-sm p-1 text-center mt-1 mb-4 py-3" style="cursor:pointer;">
            <h1 class="text-2xl font-semibold tracking-tight text-white">{{ $title }}</h1>
        </div>
    </div> --}}

    <ul class="ml-auto flex items-center">
        <li class="mr-1 dropdown">
            <button type="button"
                class="dropdown-toggle text-gray-400 mr-4 w-8 h-8 rounded flex items-center justify-center  hover:text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    class="hover:bg-gray-100 rounded-full" viewBox="0 0 24 24"
                    style="fill: gray;transform: ;msFilter:;">
                    <path
                        d="M19.023 16.977a35.13 35.13 0 0 1-1.367-1.384c-.372-.378-.596-.653-.596-.653l-2.8-1.337A6.962 6.962 0 0 0 16 9c0-3.859-3.14-7-7-7S2 5.141 2 9s3.14 7 7 7c1.763 0 3.37-.66 4.603-1.739l1.337 2.8s.275.224.653.596c.387.363.896.854 1.384 1.367l1.358 1.392.604.646 2.121-2.121-.646-.604c-.379-.372-.885-.866-1.391-1.36zM9 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z">
                    </path>
                </svg>
            </button>
            <div
                class="dropdown-menu shadow-md shadow-black/5 z-30 hidden max-w-xs w-full bg-white rounded-md border border-gray-100">
                <form action="" class="p-4 border-b border-b-gray-100">
                    <div class="relative w-full">
                        <input type="text"
                            class="py-2 pr-4 pl-10 bg-gray-50 w-full outline-none border border-gray-100 rounded-md text-sm focus:border-blue-500"
                            placeholder="Search...">
                        <i class="ri-search-line absolute top-1/2 left-4 -translate-y-1/2 text-gray-900"></i>
                    </div>
                </form>
            </div>
        </li>
        <li class="dropdown">
            <button type="button"
                class="dropdown-toggle text-gray-400 mr-4 w-8 h-8 rounded flex items-center justify-center  hover:text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    class="hover:bg-gray-100 rounded-full" viewBox="0 0 24 24"
                    style="fill: gray;transform: ;msFilter:;">
                    <path
                        d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z">
                    </path>
                </svg>
            </button>
            <div
                class="dropdown-menu shadow-md shadow-black/5 z-30 hidden max-w-xs w-full bg-white rounded-md border border-gray-100">
                <div class="flex items-center px-4 pt-4 border-b border-b-gray-100 notification-tab">
                    <button type="button" data-tab="notification" data-tab-page="notifications"
                        class="text-gray-400 font-medium text-[13px] hover:text-gray-600 border-b-2 border-b-transparent mr-4 pb-1 active">Notifications</button>
                    <button type="button" data-tab="notification" data-tab-page="messages"
                        class="text-gray-400 font-medium text-[13px] hover:text-gray-600 border-b-2 border-b-transparent mr-4 pb-1">Messages</button>
                </div>
                <div class="my-2">
                    <ul class="max-h-64 overflow-y-auto" data-tab-for="notification" data-page="notifications">
                        <li>
                            <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                <img src="https://placehold.co/32x32" alt=""
                                    class="w-8 h-8 rounded block object-cover align-middle">
                                <div class="ml-2">
                                    <div
                                        class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                        New order</div>
                                    <div class="text-[11px] text-gray-400">from a user</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                <img src="https://placehold.co/32x32" alt=""
                                    class="w-8 h-8 rounded block object-cover align-middle">
                                <div class="ml-2">
                                    <div
                                        class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                        New order</div>
                                    <div class="text-[11px] text-gray-400">from a user</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                <img src="https://placehold.co/32x32" alt=""
                                    class="w-8 h-8 rounded block object-cover align-middle">
                                <div class="ml-2">
                                    <div
                                        class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                        New order</div>
                                    <div class="text-[11px] text-gray-400">from a user</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                <img src="https://placehold.co/32x32" alt=""
                                    class="w-8 h-8 rounded block object-cover align-middle">
                                <div class="ml-2">
                                    <div
                                        class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                        New order</div>
                                    <div class="text-[11px] text-gray-400">from a user</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                <img src="https://placehold.co/32x32" alt=""
                                    class="w-8 h-8 rounded block object-cover align-middle">
                                <div class="ml-2">
                                    <div
                                        class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                        New order</div>
                                    <div class="text-[11px] text-gray-400">from a user</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <ul class="max-h-64 overflow-y-auto hidden" data-tab-for="notification" data-page="messages">
                        <li>
                            <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                <img src="https://placehold.co/32x32" alt=""
                                    class="w-8 h-8 rounded block object-cover align-middle">
                                <div class="ml-2">
                                    <div
                                        class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                        John Doe</div>
                                    <div class="text-[11px] text-gray-400">Hello there!</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                <img src="https://placehold.co/32x32" alt=""
                                    class="w-8 h-8 rounded block object-cover align-middle">
                                <div class="ml-2">
                                    <div
                                        class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                        John Doe</div>
                                    <div class="text-[11px] text-gray-400">Hello there!</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                <img src="https://placehold.co/32x32" alt=""
                                    class="w-8 h-8 rounded block object-cover align-middle">
                                <div class="ml-2">
                                    <div
                                        class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                        John Doe</div>
                                    <div class="text-[11px] text-gray-400">Hello there!</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                <img src="https://placehold.co/32x32" alt=""
                                    class="w-8 h-8 rounded block object-cover align-middle">
                                <div class="ml-2">
                                    <div
                                        class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                        John Doe</div>
                                    <div class="text-[11px] text-gray-400">Hello there!</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                <img src="https://placehold.co/32x32" alt=""
                                    class="w-8 h-8 rounded block object-cover align-middle">
                                <div class="ml-2">
                                    <div
                                        class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                        John Doe</div>
                                    <div class="text-[11px] text-gray-400">Hello there!</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
        <button id="fullscreen-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                class="hover:bg-gray-100 rounded-full" viewBox="0 0 24 24" style="fill: gray;transform: ;msFilter:;">
                <path d="M5 5h5V3H3v7h2zm5 14H5v-5H3v7h7zm11-5h-2v5h-5v2h7zm-2-4h2V3h-7v2h5z"></path>
            </svg>
        </button>
        <script>
            const fullscreenButton = document.getElementById('fullscreen-button');

            fullscreenButton.addEventListener('click', toggleFullscreen);

            function toggleFullscreen() {
                if (document.fullscreenElement) {
                    // If already in fullscreen, exit fullscreen
                    document.exitFullscreen();
                } else {
                    // If not in fullscreen, request fullscreen
                    document.documentElement.requestFullscreen();
                }
            }
        </script>

        <div class="flex justify-end">
            <!-- Drodown -->
            <div x-data="{ isOpen: false }" class="relative inline-block">
                <!-- Dropdown Button -->
                <div class="flex">
                    <button
                        class="flex ms-5 my-2 h-9 w-9 items-center justify-center rounded-full bg-slate-900 text-slate-100 ring-slate-100 transition hover:shadow-md hover:ring-2 overflow-hidden"
                        @click="isOpen=!isOpen">
                        <img class="w-full object-cover" src="{{ asset('img/1.jfif') }}" alt="Profile">
                        <div class="top-1 left-12 absolute w-3 h-3 bg-lime-400 border-2 border-white rounded-full animate-ping"></div>
                        <div class="top-1 left-12 absolute w-3 h-3 bg-lime-500 border-2 border-white rounded-full"></div>
                    </button>
                    <div class="p-2 md:block text-left cursor-pointer" @click="isOpen=!isOpen">
                        <h2 class="text-sm font-semibold text-gray-800">{{ auth()->user()->name }}</h2>
                        <p class="text-xs text-gray-500">{{ auth()->user()->role }}</p>
                    </div>

                </div>

                <!-- Dropdown Menu -->
                <div x-show="isOpen" x-transition=""
                    class="absolute right-0 mt-5 flex w-60 flex-col gap-3 rounded-xl bg-[#ffffff] p-4 text-gray-500 shadow-lg z-50">
                    <div class="flex gap-3 items-center">
                        <div
                            class="flex items-center justify-center rounded-lg h-12 w-12 overflow-hidden border-2 border-slate-600">
                            <img class="w-full object-cover" src="{{ asset('img/1.jfif') }}" alt="Profile">
                        </div>
                        <div>
                            <div class="flex gap-1 text-sm font-semibold">
                                <span>{{ auth()->user()->name }}</span>
                                <span class="text-sky-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z">
                                        </path>
                                    </svg>
                                </span>
                            </div>
                            <div class="text-xs text-slate-400">{{ auth()->user()->email }}</div>
                        </div>
                    </div>
                    <div class="border-t border-slate-500/30"></div>
                    <div class="flex justify-around">
                        <div class="flex flex-col items-center justify-center">
                            <span class="text-3xl font-semibold">268</span>
                            <span class="text-sm text-slate-400">Following</span>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <span class="text-3xl font-semibold">897</span>
                            <span class="text-sm text-slate-400">Followers</span>
                        </div>
                    </div>
                    <div class="border-t border-slate-500/30"></div>
                    <div class="flex flex-col">
                        <a href="/dashboard" class="flex items-center gap-3 rounded-md py-2 px-3 hover:bg-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" height="22" width="20" fill="currentColor"
                                viewBox="0 0 576 512">
                                <path fill-rule="evenodd"
                                    d="M543.8 287.6c17 0 32-14 32-32.1c1-9-3-17-11-24L512 185l0-121c0-17.7-14.3-32-32-32l-32 0c-17.7 0-32 14.3-32 32l0 36.7L309.5 7c-6-5-14-7-21-7s-15 1-22 8L10 231.5c-7 7-10 15-10 24c0 18 14 32.1 32 32.1l32 0 0 69.7c-.1 .9-.1 1.8-.1 2.8l0 112c0 22.1 17.9 40 40 40l16 0c1.2 0 2.4-.1 3.6-.2c1.5 .1 3 .2 4.5 .2l31.9 0 24 0c22.1 0 40-17.9 40-40l0-24 0-64c0-17.7 14.3-32 32-32l64 0c17.7 0 32 14.3 32 32l0 64 0 24c0 22.1 17.9 40 40 40l24 0 32.5 0c1.4 0 2.8 0 4.2-.1c1.1 .1 2.2 .1 3.3 .1l16 0c22.1 0 40-17.9 40-40l0-16.2c.3-2.6 .5-5.3 .5-8.1l-.7-160.2 32 0z" />
                            </svg>
                            <span>Dashboard</span>
                        </a>
                        <a href="/profil" class="flex items-center gap-3 rounded-md py-2 px-3 hover:bg-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="h-5 w-5">
                                <path fill-rule="evenodd"
                                    d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Profile</span>
                        </a>
                        <a href="#" class="flex items-center gap-3 rounded-md py-2 px-3 hover:bg-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="h-5 w-5">
                                <path fill-rule="evenodd"
                                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm11.378-3.917c-.89-.777-2.366-.777-3.255 0a.75.75 0 01-.988-1.129c1.454-1.272 3.776-1.272 5.23 0 1.513 1.324 1.513 3.518 0 4.842a3.75 3.75 0 01-.837.552c-.676.328-1.028.774-1.028 1.152v.75a.75.75 0 01-1.5 0v-.75c0-1.279 1.06-2.107 1.875-2.502.182-.088.351-.199.503-.331.83-.727.83-1.857 0-2.584zM12 18a.75.75 0 100-1.5.75.75 0 000 1.5z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Help Center</span>
                        </a>
                    </div>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit"
                            class="flex justify-center gap-3 rounded-md bg-red-600 py-2 px-3 font-semibold hover:bg-red-500 focus:ring-2 focus:ring-red-400 w-52 text-primary-50">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="h-6 w-6">
                                <path fill-rule="evenodd"
                                    d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm10.72 4.72a.75.75 0 011.06 0l3 3a.75.75 0 010 1.06l-3 3a.75.75 0 11-1.06-1.06l1.72-1.72H9a.75.75 0 010-1.5h10.94l-1.72-1.72a.75.75 0 010-1.06z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Logout</span>
                        </button>

                    </form>
                </div>
            </div>
        </div>

    </ul>
</div>
<!-- end navbar -->
