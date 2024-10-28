<!--sidenav -->
<div class="fixed left-0 top-0 w-64 h-full bg-[#ffffff] p-4 z-50 sidebar-menu transition-transform overflow-auto">
    <a href="/dashboard" class="flex items-center pb-4 border-b border-b-gray-800">
        <h2 class="font-bold text-xl">SPPD <span class="bg-blue-500 text-white px-2 py-1 rounded-md">Laravel</span></h2>

    </a>
    <ul class="mt-4">
        <li class="mb-1 group">
            <a href="/dashboard"
                class="flex font-semibold items-center py-2 px-4 text-gray-600 hover:bg-gray-200 hover:text-gray-900 hover:font-semibold rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100">
                <svg class="w-[23px] h-[23px] text-gray-400 dark:text-white hover:text-gray-800" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z"
                        clip-rule="evenodd" />
                </svg>
                <span class="text-sm ms-2">Dashboard</span>
            </a>
        </li>
        {{-- @can('admin') --}}
        <span class="text-gray-950 font-bold">ADMIN</span>
        <li class="mb-1 group">
            <a href=""
                class="flex font-semibold items-center py-2 px-4 text-gray-600 hover:bg-gray-200 hover:text-gray-900 hover:font-semibold rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                <svg class="w-[23px] h-[23px] text-gray-400 dark:text-white hover:text-gray-800" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                        clip-rule="evenodd" />
                </svg>

                <span class="text-sm ms-2">Akun</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>
            <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                <li class="mb-4">
                    <a href="/dashboard/users/"
                        class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Semua</a>
                </li>
                <li class="mb-4">
                    <a href=""
                        class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Role</a>
                </li>
            </ul>
        </li>
        <li class="mb-1 group">
            <a href=""
                class="flex font-semibold items-center py-2 px-4 text-gray-600 hover:bg-gray-200 hover:text-gray-900 hover:font-semibold rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                <svg class="w-[23px] h-[23px] text-gray-400 dark:text-white hover:text-gray-800" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M10 2a3 3 0 0 0-3 3v1H5a3 3 0 0 0-3 3v2.382l1.447.723.005.003.027.013.12.056c.108.05.272.123.486.212.429.177 1.056.416 1.834.655C7.481 13.524 9.63 14 12 14c2.372 0 4.52-.475 6.08-.956.78-.24 1.406-.478 1.835-.655a14.028 14.028 0 0 0 .606-.268l.027-.013.005-.002L22 11.381V9a3 3 0 0 0-3-3h-2V5a3 3 0 0 0-3-3h-4Zm5 4V5a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v1h6Zm6.447 7.894.553-.276V19a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3v-5.382l.553.276.002.002.004.002.013.006.041.02.151.07c.13.06.318.144.557.242.478.198 1.163.46 2.01.72C7.019 15.476 9.37 16 12 16c2.628 0 4.98-.525 6.67-1.044a22.95 22.95 0 0 0 2.01-.72 15.994 15.994 0 0 0 .707-.312l.041-.02.013-.006.004-.002.001-.001-.431-.866.432.865ZM12 10a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H12Z"
                        clip-rule="evenodd" />
                </svg>

                <span class="text-sm ms-2">SPPD</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>
            <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                <li class="mb-4">
                    <a href="/dashboard/categories"
                        class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Kategori
                        SPPD</a>
                </li>
                <li class="mb-4">
                    <a href=""
                        class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Status</a>
                </li>
            </ul>
        </li>
        <li class="mb-1 group">
            <a href=""
                class="flex font-semibold items-center py-2 px-4 text-gray-600 hover:bg-gray-200 hover:text-gray-900 hover:font-semibold rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100">
                <svg class="w-[23px] h-[23px] text-gray-400 dark:text-white hover:text-gray-800" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6Zm4.996 2a1 1 0 0 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 8a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 11a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 14a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Z"
                        clip-rule="evenodd" />
                </svg>

                <span class="text-sm ms-2">Aktivitas</span>
            </a>
        </li>
        {{-- @endcan --}}
        <span class="text-gray-950 font-bold">PERJALANAN DINAS</span>
        <li class="mb-1 group">
            <a href=""
                class="flex font-semibold items-center py-2 px-4 text-gray-600 hover:bg-gray-200 hover:text-gray-900 hover:font-semibold rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                <svg class="w-[23px] h-[23px] text-gray-400 dark:text-white hover:text-gray-800" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M20 14h-2.722L11 20.278a5.511 5.511 0 0 1-.9.722H20a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1ZM9 3H4a1 1 0 0 0-1 1v13.5a3.5 3.5 0 1 0 7 0V4a1 1 0 0 0-1-1ZM6.5 18.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM19.132 7.9 15.6 4.368a1 1 0 0 0-1.414 0L12 6.55v9.9l7.132-7.132a1 1 0 0 0 0-1.418Z" />
                </svg>

                <span class="text-sm ms-2">Daftar SPT</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>
            <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                <li class="mb-4">
                    <a href="/dashboard/posts"
                        class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Semua</a>
                </li>
                <li class="mb-4">
                    <a href=""
                        class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Kategori</a>
                </li>
            </ul>
        </li>
        <li class="mb-1 group">
            <a href="/dashboard/posts/create"
                class="flex font-semibold items-center py-2 px-4 text-gray-600 hover:bg-gray-200 hover:text-gray-900 hover:font-semibold rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100">
                <svg class="w-[23px] h-[23px] text-gray-400 dark:text-white hover:text-gray-800" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v6.41A7.5 7.5 0 1 0 10.5 22H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z"
                        clip-rule="evenodd" />
                    <path fill-rule="evenodd"
                        d="M9 16a6 6 0 1 1 12 0 6 6 0 0 1-12 0Zm6-3a1 1 0 0 1 1 1v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 1 1 0-2h1v-1a1 1 0 0 1 1-1Z"
                        clip-rule="evenodd" />
                </svg>

                <span class="text-sm ms-2">Pengajuan SPT</span>
            </a>
        </li>
        <span class="text-gray-950 font-bold">BENDAHARA</span>
        <li class="mb-1 group">
            <a href=""
                class="flex font-semibold items-center py-2 px-4 text-gray-600 hover:bg-gray-200 hover:text-gray-900 hover:font-semibold rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100">
                <svg class="w-[23px] h-[23px] text-gray-400 dark:text-white hover:text-gray-800" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M8 7V2.221a2 2 0 0 0-.5.365L3.586 6.5a2 2 0 0 0-.365.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.126a5.087 5.087 0 0 0-4.74 1.368v.001l-6.642 6.642a3 3 0 0 0-.82 1.532l-.74 3.692a3 3 0 0 0 3.53 3.53l3.694-.738a3 3 0 0 0 1.532-.82L19 15.149V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z"
                        clip-rule="evenodd" />
                    <path fill-rule="evenodd"
                        d="M17.447 8.08a1.087 1.087 0 0 1 1.187.238l.002.001a1.088 1.088 0 0 1 0 1.539l-.377.377-1.54-1.542.373-.374.002-.001c.1-.102.22-.182.353-.237Zm-2.143 2.027-4.644 4.644-.385 1.924 1.925-.385 4.644-4.642-1.54-1.54Zm2.56-4.11a3.087 3.087 0 0 0-2.187.909l-6.645 6.645a1 1 0 0 0-.274.51l-.739 3.693a1 1 0 0 0 1.177 1.176l3.693-.738a1 1 0 0 0 .51-.274l6.65-6.646a3.088 3.088 0 0 0-2.185-5.275Z"
                        clip-rule="evenodd" />
                </svg>

                <span class="text-sm ms-2">Input Anggaran</span>

                <span
                    class=" md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-600 bg-red-200 rounded-full">5</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href=""
                class="flex font-semibold items-center py-2 px-4 text-gray-600 hover:bg-gray-200 hover:text-gray-900 hover:font-semibold rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100">
                <svg class="w-[23px] h-[23px] text-gray-400 dark:text-white hover:text-gray-800" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z"
                        clip-rule="evenodd" />
                </svg>

                <span class="text-sm ms-2">Laporan</span>
                <span
                    class=" md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-green-600 bg-green-200 rounded-full">2
                    New</span>
            </a>
        </li>
        <span class="text-gray-950 font-bold">PERSONAL</span>
        <li class="mb-1 group">
            <a href=""
                class="flex font-semibold items-center py-2 px-4 text-gray-600 hover:bg-gray-200 hover:text-gray-900 hover:font-semibold rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100">
                <svg class="w-[23px] h-[23px] text-gray-400 dark:text-white hover:text-gray-800" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M17.133 12.632v-1.8a5.406 5.406 0 0 0-4.154-5.262.955.955 0 0 0 .021-.106V3.1a1 1 0 0 0-2 0v2.364a.955.955 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C6.867 15.018 5 15.614 5 16.807 5 17.4 5 18 5.538 18h12.924C19 18 19 17.4 19 16.807c0-1.193-1.867-1.789-1.867-4.175ZM8.823 19a3.453 3.453 0 0 0 6.354 0H8.823Z" />
                </svg>

                <span class="text-sm ms-2">Notifications</span>
                <span
                    class=" md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-600 bg-red-200 rounded-full">5</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href=""
                class="flex font-semibold items-center py-2 px-4 text-gray-600 hover:bg-gray-200 hover:text-gray-900 hover:font-semibold rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100">
                <svg class="w-[23px] h-[23px] text-gray-400 dark:text-white hover:text-gray-800" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M2.038 5.61A2.01 2.01 0 0 0 2 6v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6c0-.12-.01-.238-.03-.352l-.866.65-7.89 6.032a2 2 0 0 1-2.429 0L2.884 6.288l-.846-.677Z" />
                    <path
                        d="M20.677 4.117A1.996 1.996 0 0 0 20 4H4c-.225 0-.44.037-.642.105l.758.607L12 10.742 19.9 4.7l.777-.583Z" />
                </svg>

                <span class="text-sm ms-2">Messages</span>
                <span
                    class=" md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-green-600 bg-green-200 rounded-full">2
                    New</span>
            </a>
        </li>
    </ul>
</div>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
<!-- end sidenav -->
