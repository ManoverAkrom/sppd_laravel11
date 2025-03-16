<!--sidenav -->
<div class="fixed left-0 top-0 w-64 h-full bg-[#ffffff] p-4 z-50 sidebar-menu transition-transform overflow-auto">
    <a href="/dashboard" class="flex items-center pb-4 border-b border-b-gray-800">
        <h2 class="font-bold text-xl">SPPD <span class="bg-blue-500 text-white px-2 py-1 rounded-md">Laravel</span></h2>

    </a>
    <ul class="mt-4">

        <li class="mb-1 group">
            <a href="/dashboard/"
                class="flex font-semibold items-center py-2 px-3 text-gray-700 hover:bg-gray-200 hover:text-gray-900 hover:font-semibold rounded-md ">
                <svg class="w-[23px] h-[23px] text-gray-500 dark:text-white hover:text-gray-800" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z"
                        clip-rule="evenodd" />
                </svg>

                <span class="text-sm ms-2 my-2">Dashboard</span>
            </a>
        </li>

        {{-- @can('admin') --}}
        <li class="mb-1 group">
            <a href=""
                class="flex font-semibold items-center py-2 px-3 text-gray-700 hover:bg-gray-200 hover:text-gray-900 hover:font-semibold rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                <svg class="w-[23px] h-[23px] text-gray-500 dark:text-white group-[.selected]:text-gray-100"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M17 10v1.126c.367.095.714.24 1.032.428l.796-.797 1.415 1.415-.797.796c.188.318.333.665.428 1.032H21v2h-1.126c-.095.367-.24.714-.428 1.032l.797.796-1.415 1.415-.796-.797a3.979 3.979 0 0 1-1.032.428V20h-2v-1.126a3.977 3.977 0 0 1-1.032-.428l-.796.797-1.415-1.415.797-.796A3.975 3.975 0 0 1 12.126 16H11v-2h1.126c.095-.367.24-.714.428-1.032l-.797-.796 1.415-1.415.796.797A3.977 3.977 0 0 1 15 11.126V10h2Zm.406 3.578.016.016c.354.358.574.85.578 1.392v.028a2 2 0 0 1-3.409 1.406l-.01-.012a2 2 0 0 1 2.826-2.83ZM5 8a4 4 0 1 1 7.938.703 7.029 7.029 0 0 0-3.235 3.235A4 4 0 0 1 5 8Zm4.29 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h6.101A6.979 6.979 0 0 1 9 15c0-.695.101-1.366.29-2Z"
                        clip-rule="evenodd" />
                </svg>

                <span class="text-sm ms-2 my-2">Adiminstrator</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>
            <ul class="pl-7 mt-2 hidden group-[.selected]:block ">
                <li class="mb-4 transition-all duration-300 hover:translate-x-1">
                    <a href="/dashboard/institutes"
                        class="text-gray-700 text-sm flex items-center hover:text-gray-900 hover:font-semibold">
                        <svg class="w-[23px] h-[23px] text-gray-400 dark:text-white hover:text-gray-800"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm ms-2 my-1">
                            Profil Instansi
                        </span>
                    </a>
                </li>
                <li class="mb-4 transition-all duration-300 hover:translate-x-1">
                    <a href="/dashboard/users"
                        class="text-gray-700 text-sm flex items-center hover:text-gray-900 hover:font-semibold">
                        <svg class="w-[23px] h-[23px] text-gray-400 dark:text-white hover:text-gray-800"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm ms-2 my-1">
                            Akun
                        </span>
                    </a>
                </li>

                <li class="mb-4 transition-all duration-300 hover:translate-x-1">
                    <a href="/dashboard/categories"
                        class="text-gray-700 text-sm flex items-center hover:text-gray-900 hover:font-semibold">
                        <svg class="w-[23px] h-[23px] text-gray-400 dark:text-white hover:text-gray-800"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M10 2a3 3 0 0 0-3 3v1H5a3 3 0 0 0-3 3v2.382l1.447.723.005.003.027.013.12.056c.108.05.272.123.486.212.429.177 1.056.416 1.834.655C7.481 13.524 9.63 14 12 14c2.372 0 4.52-.475 6.08-.956.78-.24 1.406-.478 1.835-.655a14.028 14.028 0 0 0 .606-.268l.027-.013.005-.002L22 11.381V9a3 3 0 0 0-3-3h-2V5a3 3 0 0 0-3-3h-4Zm5 4V5a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v1h6Zm6.447 7.894.553-.276V19a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3v-5.382l.553.276.002.002.004.002.013.006.041.02.151.07c.13.06.318.144.557.242.478.198 1.163.46 2.01.72C7.019 15.476 9.37 16 12 16c2.628 0 4.98-.525 6.67-1.044a22.95 22.95 0 0 0 2.01-.72 15.994 15.994 0 0 0 .707-.312l.041-.02.013-.006.004-.002.001-.001-.431-.866.432.865ZM12 10a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H12Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm ms-2 my-1">
                            Kategori Surat
                        </span>
                    </a>
                </li>

                <li class="mb-4 transition-all duration-300 hover:translate-x-1">
                    <a href="/dashboard/activities"
                        class="text-gray-700 text-sm flex items-center hover:text-gray-900 hover:font-semibold">
                        <svg class="w-[23px] h-[23px] text-gray-400 dark:text-white hover:text-gray-800"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6Zm4.996 2a1 1 0 0 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 8a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 11a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 14a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm ms-2 my-1">
                            Aktivitas
                        </span>
                    </a>
                </li>

            </ul>
        </li>
        {{-- @endcan --}}

        {{-- @can('master') --}}
        <li class="mb-1 group">
            <a href=""
                class="flex font-semibold items-center py-2 px-3 text-gray-700 hover:bg-gray-200 hover:text-gray-900 hover:font-semibold rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">

                <svg class="w-[23px] h-[23px] text-gray-500 dark:text-white group-[.selected]:text-gray-100"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                        clip-rule="evenodd" />
                </svg>


                <span class="text-sm ms-2 my-2">Kepala Sekolah</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>
            <ul class="pl-7 mt-2 hidden group-[.selected]:block ">
                <li class="mb-4 transition-all duration-300 hover:translate-x-1">
                    <a href="/dashboard/master"
                        class="text-gray-700 text-sm flex items-center hover:text-gray-900 hover:font-semibold">

                        <svg class="w-[23px] h-[23px] text-gray-400 dark:text-white hover:text-gray-800"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Z" />
                            <path fill-rule="evenodd"
                                d="M11 7V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm4.707 5.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z"
                                clip-rule="evenodd" />
                        </svg>

                        <span class="text-sm ms-2 my-1">
                            Persetujuan
                        </span>
                    </a>
                </li>

            </ul>
        </li>
        {{-- @endcan --}}

        <li class="mb-1 group">
            <a href=""
                class="flex font-semibold items-center py-2 px-3 text-gray-700 hover:bg-gray-200 hover:text-gray-900 hover:font-semibold rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                <svg class="w-[23px] h-[23px] text-gray-500 dark:text-white group-[.selected]:text-gray-100"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M12 4a1 1 0 1 0 0 2 1 1 0 0 0 0-2Zm-2.952.462c-.483.19-.868.432-1.19.71-.363.315-.638.677-.831.93l-.106.14c-.21.268-.36.418-.574.527C6.125 6.883 5.74 7 5 7a1 1 0 0 0 0 2c.364 0 .696-.022 1-.067v.41l-1.864 4.2a1.774 1.774 0 0 0 .821 2.255c.255.133.538.202.825.202h2.436a1.786 1.786 0 0 0 1.768-1.558 1.774 1.774 0 0 0-.122-.899L8 9.343V8.028c.2-.188.36-.38.495-.553.062-.079.118-.15.168-.217.185-.24.311-.406.503-.571a1.89 1.89 0 0 1 .24-.177A3.01 3.01 0 0 0 11 7.829V20H5.5a1 1 0 1 0 0 2h13a1 1 0 1 0 0-2H13V7.83a3.01 3.01 0 0 0 1.63-1.387c.206.091.373.19.514.29.31.219.532.465.811.78l.025.027.02.023v1.78l-1.864 4.2a1.774 1.774 0 0 0 .821 2.255c.255.133.538.202.825.202h2.436a1.785 1.785 0 0 0 1.768-1.558 1.773 1.773 0 0 0-.122-.899L18 9.343v-.452c.302.072.633.109 1 .109a1 1 0 1 0 0-2c-.48 0-.731-.098-.899-.2-.2-.12-.363-.293-.651-.617l-.024-.026c-.267-.3-.622-.7-1.127-1.057a5.152 5.152 0 0 0-1.355-.678 3.001 3.001 0 0 0-5.896.04Z"
                        clip-rule="evenodd" />
                </svg>

                <span class="text-sm ms-2 my-2">Bendahara</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>
            <ul class="pl-7 mt-2 hidden group-[.selected]:block ">
                <li class="mb-4 transition-all duration-300 hover:translate-x-1">
                    <a href="/finance/categories"
                        class="text-gray-700 text-sm flex items-center hover:text-gray-900 hover:font-semibold">
                        <svg class="w-[23px] h-[23px] text-gray-400 dark:text-white hover:text-gray-800"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M8 7V2.221a2 2 0 0 0-.5.365L3.586 6.5a2 2 0 0 0-.365.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.126a5.087 5.087 0 0 0-4.74 1.368v.001l-6.642 6.642a3 3 0 0 0-.82 1.532l-.74 3.692a3 3 0 0 0 3.53 3.53l3.694-.738a3 3 0 0 0 1.532-.82L19 15.149V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M17.447 8.08a1.087 1.087 0 0 1 1.187.238l.002.001a1.088 1.088 0 0 1 0 1.539l-.377.377-1.54-1.542.373-.374.002-.001c.1-.102.22-.182.353-.237Zm-2.143 2.027-4.644 4.644-.385 1.924 1.925-.385 4.644-4.642-1.54-1.54Zm2.56-4.11a3.087 3.087 0 0 0-2.187.909l-6.645 6.645a1 1 0 0 0-.274.51l-.739 3.693a1 1 0 0 0 1.177 1.176l3.693-.738a1 1 0 0 0 .51-.274l6.65-6.646a3.088 3.088 0 0 0-2.185-5.275Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm ms-2 my-1">
                            Kategori Perjalanan
                        </span>
                    </a>
                </li>
                <li class="mb-4 transition-all duration-300 hover:translate-x-1">
                    <a href="/finance/components"
                        class="text-gray-700 text-sm flex items-center hover:text-gray-900 hover:font-semibold">
                        <svg class="w-[23px] h-[23px] text-gray-400 dark:text-white hover:text-gray-800"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M8 7V2.221a2 2 0 0 0-.5.365L3.586 6.5a2 2 0 0 0-.365.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.126a5.087 5.087 0 0 0-4.74 1.368v.001l-6.642 6.642a3 3 0 0 0-.82 1.532l-.74 3.692a3 3 0 0 0 3.53 3.53l3.694-.738a3 3 0 0 0 1.532-.82L19 15.149V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M17.447 8.08a1.087 1.087 0 0 1 1.187.238l.002.001a1.088 1.088 0 0 1 0 1.539l-.377.377-1.54-1.542.373-.374.002-.001c.1-.102.22-.182.353-.237Zm-2.143 2.027-4.644 4.644-.385 1.924 1.925-.385 4.644-4.642-1.54-1.54Zm2.56-4.11a3.087 3.087 0 0 0-2.187.909l-6.645 6.645a1 1 0 0 0-.274.51l-.739 3.693a1 1 0 0 0 1.177 1.176l3.693-.738a1 1 0 0 0 .51-.274l6.65-6.646a3.088 3.088 0 0 0-2.185-5.275Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm ms-2 my-1">
                            Komponen Perjalanan
                        </span>
                    </a>
                </li>

                <li class="mb-4 transition-all duration-300 hover:translate-x-1">
                    <a href="/dashboard/budgets"
                        class="text-gray-700 text-sm flex items-center hover:text-gray-900 hover:font-semibold">
                        <svg class="w-[23px] h-[23px] text-gray-400 dark:text-white hover:text-gray-800"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M8 7V2.221a2 2 0 0 0-.5.365L3.586 6.5a2 2 0 0 0-.365.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.126a5.087 5.087 0 0 0-4.74 1.368v.001l-6.642 6.642a3 3 0 0 0-.82 1.532l-.74 3.692a3 3 0 0 0 3.53 3.53l3.694-.738a3 3 0 0 0 1.532-.82L19 15.149V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M17.447 8.08a1.087 1.087 0 0 1 1.187.238l.002.001a1.088 1.088 0 0 1 0 1.539l-.377.377-1.54-1.542.373-.374.002-.001c.1-.102.22-.182.353-.237Zm-2.143 2.027-4.644 4.644-.385 1.924 1.925-.385 4.644-4.642-1.54-1.54Zm2.56-4.11a3.087 3.087 0 0 0-2.187.909l-6.645 6.645a1 1 0 0 0-.274.51l-.739 3.693a1 1 0 0 0 1.177 1.176l3.693-.738a1 1 0 0 0 .51-.274l6.65-6.646a3.088 3.088 0 0 0-2.185-5.275Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm ms-2 my-1">
                            Perencanaan
                        </span>
                    </a>
                </li>

                <li class="mb-4 transition-all duration-300 hover:translate-x-1">
                    <a href="/dashboard/budgets"
                        class="text-gray-700 text-sm flex items-center hover:text-gray-900 hover:font-semibold">

                        <svg class="w-[23px] h-[23px] text-gray-400 dark:text-white hover:text-gray-800"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M9 15a6 6 0 1 1 12 0 6 6 0 0 1-12 0Zm3.845-1.855a2.4 2.4 0 0 1 1.2-1.226 1 1 0 0 1 1.992-.026c.426.15.809.408 1.111.749a1 1 0 1 1-1.496 1.327.682.682 0 0 0-.36-.213.997.997 0 0 1-.113-.032.4.4 0 0 0-.394.074.93.93 0 0 0 .455.254 2.914 2.914 0 0 1 1.504.9c.373.433.669 1.092.464 1.823a.996.996 0 0 1-.046.129c-.226.519-.627.94-1.132 1.192a1 1 0 0 1-1.956.093 2.68 2.68 0 0 1-1.227-.798 1 1 0 1 1 1.506-1.315.682.682 0 0 0 .363.216c.038.009.075.02.111.032a.4.4 0 0 0 .395-.074.93.93 0 0 0-.455-.254 2.91 2.91 0 0 1-1.503-.9c-.375-.433-.666-1.089-.466-1.817a.994.994 0 0 1 .047-.134Zm1.884.573.003.008c-.003-.005-.003-.008-.003-.008Zm.55 2.613s-.002-.002-.003-.007a.032.032 0 0 1 .003.007ZM4 14a1 1 0 0 1 1 1v4a1 1 0 1 1-2 0v-4a1 1 0 0 1 1-1Zm3-2a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1Zm6.5-8a1 1 0 0 1 1-1H18a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-.796l-2.341 2.049a1 1 0 0 1-1.24.06l-2.894-2.066L6.614 9.29a1 1 0 1 1-1.228-1.578l4.5-3.5a1 1 0 0 1 1.195-.025l2.856 2.04L15.34 5h-.84a1 1 0 0 1-1-1Z"
                                clip-rule="evenodd" />
                        </svg>

                        <span class="text-sm ms-2 my-1">
                            Pengeluaran
                        </span>
                    </a>
                </li>

                <li class="mb-4 transition-all duration-300 hover:translate-x-1">
                    <a href="/dashboard/posts/create/"
                        class="text-gray-700 text-sm flex items-center hover:text-gray-900 hover:font-semibold">
                        <svg class="w-[23px] h-[23px] text-gray-400 dark:text-white hover:text-gray-800"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm ms-2 my-1">
                            Laporan
                        </span>
                    </a>
                </li>

            </ul>
        </li>

        <li class="mb-1 group">
            <a href=""
                class="flex font-semibold items-center py-2 px-3 text-gray-700 hover:bg-gray-200 hover:text-gray-900 hover:font-semibold rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                <svg class="w-[23px] h-[23px] text-gray-500 dark:text-white group-[.selected]:text-gray-100"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M20.337 3.664c.213.212.354.486.404.782.294 1.711.657 5.195-.906 6.76-1.77 1.768-8.485 5.517-10.611 6.683a.987.987 0 0 1-1.176-.173l-.882-.88-.877-.884a.988.988 0 0 1-.173-1.177c1.165-2.126 4.913-8.841 6.682-10.611 1.562-1.563 5.046-1.198 6.757-.904.296.05.57.191.782.404ZM5.407 7.576l4-.341-2.69 4.48-2.857-.334a.996.996 0 0 1-.565-1.694l2.112-2.111Zm11.357 7.02-.34 4-2.111 2.113a.996.996 0 0 1-1.69-.565l-.422-2.807 4.563-2.74Zm.84-6.21a1.99 1.99 0 1 1-3.98 0 1.99 1.99 0 0 1 3.98 0Z"
                        clip-rule="evenodd" />
                </svg>


                <span class="text-sm ms-2 my-2">Perjalanan Dinas</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>
            <ul class="pl-7 mt-2 hidden group-[.selected]:block ">
                <li class="mb-4 transition-all duration-300 hover:translate-x-1">
                    <a href="/dashboard/posts"
                        class="text-gray-700 text-sm flex items-center hover:text-gray-900 hover:font-semibold">
                        <svg class="w-[23px] h-[23px] text-gray-400 dark:text-white hover:text-gray-800"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M20 14h-2.722L11 20.278a5.511 5.511 0 0 1-.9.722H20a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1ZM9 3H4a1 1 0 0 0-1 1v13.5a3.5 3.5 0 1 0 7 0V4a1 1 0 0 0-1-1ZM6.5 18.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM19.132 7.9 15.6 4.368a1 1 0 0 0-1.414 0L12 6.55v9.9l7.132-7.132a1 1 0 0 0 0-1.418Z" />
                        </svg>
                        <span class="text-sm ms-2 my-1">
                            Daftar SPT
                        </span>
                    </a>
                </li>

                <li class="mb-4 transition-all duration-300 hover:translate-x-1">
                    <a href="/dashboard/posts/create/"
                        class="text-gray-700 text-sm flex items-center hover:text-gray-900 hover:font-semibold">
                        <svg class="w-[23px] h-[23px] text-gray-400 dark:text-white hover:text-gray-800"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v6.41A7.5 7.5 0 1 0 10.5 22H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M9 16a6 6 0 1 1 12 0 6 6 0 0 1-12 0Zm6-3a1 1 0 0 1 1 1v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 1 1 0-2h1v-1a1 1 0 0 1 1-1Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm ms-2 my-1">
                            Pengajuan SPT
                        </span>
                    </a>
                </li>

            </ul>
        </li>


        <li class="mb-1 group">
            <a href=""
                class="flex font-semibold items-center py-2 px-3 text-gray-700 hover:bg-gray-200 hover:text-gray-900 hover:font-semibold rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                <svg class="w-[23px] h-[23px] text-gray-500 dark:text-white group-[.selected]:text-gray-100"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M10.451 3.244C9.911 2.514 9.052 2 8.038 2 6.378 2 5 3.326 5 5c0 1.315.88 2.36 2.004 2.787a5.082 5.082 0 0 0 .177 1.55L6.08 9.65a2.868 2.868 0 0 0-.802 5.145A3.5 3.5 0 1 0 10.663 19h2.674a3.5 3.5 0 1 0 5.11-4.409 2.865 2.865 0 0 0-.954-4.953l-.696-.223a5.002 5.002 0 0 0 .2-1.588l-.001-.031C18.128 7.367 19 6.311 19 5c0-1.684-1.397-3-3.059-3-1.005 0-1.841.554-2.384 1.247A4.996 4.996 0 0 0 12 3c-.54 0-1.061.086-1.549.244ZM8.685 4.257c-.49.435-.895.964-1.184 1.56C7.193 5.624 7 5.304 7 5c0-.535.447-1 1.038-1a.99.99 0 0 1 .647.257ZM17 5c0 .31-.19.63-.497.824a5.017 5.017 0 0 0-1.174-1.555c.197-.169.423-.269.612-.269C16.553 4 17 4.475 17 5Zm-2 12.5a1.5 1.5 0 1 0 3 0 1.5 1.5 0 0 0-3 0Zm-9 0a1.5 1.5 0 1 0 3 0 1.5 1.5 0 0 0-3 0Zm5.043-10.012a.5.5 0 0 0-1 0v.01a.5.5 0 0 0 1 0v-.01Zm3.023.01a.5.5 0 0 0-1 0v.01a.5.5 0 1 0 1 0v-.01ZM13 9.052a1 1 0 1 0-2 0v.01a1 1 0 1 0 2 0v-.01Z"
                        clip-rule="evenodd" />
                </svg>

                <span class="text-sm ms-2 my-2">Personal</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>
            <ul class="pl-7 mt-2 hidden group-[.selected]:block ">
                <li class="mb-4 transition-all duration-300 hover:translate-x-1">
                    <a href="/dashboard/budgets"
                        class="text-gray-700 text-sm flex items-center hover:text-gray-900 hover:font-semibold">
                        <svg class="w-[23px] h-[23px] text-gray-400 dark:text-white hover:text-gray-800"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.133 12.632v-1.8a5.406 5.406 0 0 0-4.154-5.262.955.955 0 0 0 .021-.106V3.1a1 1 0 0 0-2 0v2.364a.955.955 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C6.867 15.018 5 15.614 5 16.807 5 17.4 5 18 5.538 18h12.924C19 18 19 17.4 19 16.807c0-1.193-1.867-1.789-1.867-4.175ZM8.823 19a3.453 3.453 0 0 0 6.354 0H8.823Z" />
                        </svg>
                        <span class="text-sm ms-2 my-1">
                            Notifikasi
                        </span>
                        <span
                            class=" md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-600 bg-red-200 rounded-full">5</span>
                    </a>
                </li>

                <li class="mb-4 transition-all duration-300 hover:translate-x-1">
                    <a href="/dashboard/posts/create/"
                        class="text-gray-700 text-sm flex items-center hover:text-gray-900 hover:font-semibold">
                        <svg class="w-[23px] h-[23px] text-gray-400 dark:text-white hover:text-gray-800"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M2.038 5.61A2.01 2.01 0 0 0 2 6v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6c0-.12-.01-.238-.03-.352l-.866.65-7.89 6.032a2 2 0 0 1-2.429 0L2.884 6.288l-.846-.677Z" />
                            <path
                                d="M20.677 4.117A1.996 1.996 0 0 0 20 4H4c-.225 0-.44.037-.642.105l.758.607L12 10.742 19.9 4.7l.777-.583Z" />
                        </svg>
                        <span class="text-sm ms-2 my-1">
                            Pesan
                        </span>
                        <span
                            class=" md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-green-600 bg-green-200 rounded-full">2
                            New</span>
                    </a>

                </li>

            </ul>
        </li>

    </ul>
</div>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
<!-- end sidenav -->
