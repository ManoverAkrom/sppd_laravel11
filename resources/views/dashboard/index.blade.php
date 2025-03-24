<x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot>
    {{-- <x-dashboard.header>{{ $title }}</x-dashboard.header> --}}

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6 mt-3">
        <div
            class="group relative cursor-pointer overflow-hidden bg-white p-6 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:rounded-lg ">

            <div class="grid grid-cols-2">
                <div
                    class="flex items-center z-10 text-3xl text-left font-bold transition-all duration-300 group-hover:text-white/90">
                    {{ $totalUsers }}</div>
                <div class="flex justify-end">
                    <span
                        class="z-0 absolute h-14 w-14 rounded-full bg-sky-500 transition-all duration-300 group-hover:scale-[20]"></span>
                    <span
                        class="z-10 grid h-14 w-14 place-items-center rounded-full bg-sky-500 transition-all duration-300 group-hover:bg-sky-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-8 w-8 text-white transition-all">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                    </span>

                </div>

                <div class="z-10 grid col-span-2 pt-2">
                    <div
                        class="space-y-6 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90">
                        <p>Akun Pengguna</p>
                    </div>
                    <div class="pt-3 text-base font-semibold leading-7">
                        <p>
                            <a href="#"
                                class="text-sky-500 transition-all duration-300 group-hover:text-white">View
                            </a>
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <div
            class="group relative cursor-pointer overflow-hidden bg-white p-6 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:rounded-lg ">

            <div class="grid grid-cols-2">
                <div
                    class="flex items-center z-10 text-3xl text-left font-bold transition-all duration-300 group-hover:text-white/90">
                    {{ $totalPosts }}
                    @if ($thisMonthPost > 0)
                        <span
                            class="p-1 rounded bg-emerald-500/10 text-emerald-500 text-[12px] font-semibold leading-none ml-2"
                            bis_skin_checked="1">+{{ $thisMonthPost }}%</span>
                    @else
                    @endif
                </div>

                <div class="flex justify-end">
                    <span
                        class="z-0 absolute h-14 w-14 rounded-full bg-sky-500 transition-all duration-300 group-hover:scale-[20]"></span>

                    <span
                        class="z-10 grid h-14 w-14 place-items-center rounded-full bg-sky-500 transition-all duration-300 group-hover:bg-sky-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-8 w-8 text-white transition-all">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10 3v4a1 1 0 0 1-1 1H5m4 8h6m-6-4h6m4-8v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                        </svg>

                    </span>

                </div>

                <div class="z-10 grid col-span-2 pt-2">
                    <div
                        class="space-y-6 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90">
                        <p>Surat Perintah Tugas</p>
                    </div>
                    <div class="pt-3 text-base font-semibold leading-7">
                        <p>
                            <a href="/dashboard/posts"
                                class="text-sky-500 transition-all duration-300 group-hover:text-white">View
                            </a>
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <div
            class="group relative cursor-pointer overflow-hidden bg-white p-6 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:rounded-lg">

            <div class="flex">
                <div class="flex w-10/12 items-center">
                    <div
                        class="relative items-center z-10 text-2xl text-left font-bold transition-all duration-300 group-hover:text-white/90 align-middle">
                        Rp. {{ number_format($totalPengeluaran, 1, ',', '.') }}
                    </div>
                </div>
                <div class="w-2/12">
                    <div class="flex justify-end">
                        <span
                            class="z-0 absolute h-14 w-14 rounded-full bg-sky-500 transition-all duration-300 group-hover:scale-[20]"></span>
                        <span
                            class="z-10 grid h-14 w-14 place-items-center rounded-full bg-sky-500 transition-all duration-300 group-hover:bg-sky-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="h-8 w-8 text-white transition-all">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 17.345a4.76 4.76 0 0 0 2.558 1.618c2.274.589 4.512-.446 4.999-2.31.487-1.866-1.273-3.9-3.546-4.49-2.273-.59-4.034-2.623-3.547-4.488.486-1.865 2.724-2.899 4.998-2.31.982.236 1.87.793 2.538 1.592m-3.879 12.171V21m0-18v2.2" />
                            </svg>
                        </span>

                    </div>

                </div>

            </div>
            <div class="w-full relative">
                <div class="grid col-span-2 pt-2">
                    <div
                        class="z-10 space-y-6 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90">
                        <p>Total Pengeluaran</p>
                    </div>
                    <div class="pt-3 text-base font-semibold leading-7">
                        <p>
                            <a href="#"
                                class="text-sky-500 transition-all duration-300 group-hover:text-white">View
                            </a>
                        </p>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md mb-6">
        <div class="flex justify-between mb-4 items-start">
            <div class="font-medium">Dinas Luar Terakhir</div>
            <div class="dropdown">
                <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i
                        class="ri-more-fill"></i></button>
                <ul
                    class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                    <li>
                        <a href="/dashboard/posts"
                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Lihat
                            Semua</a>
                    </li>
                    <li>
                        <a href="/dashboard/posts/create"
                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Ajukan
                            SPT</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="overflow-hidden">
            <table class="w-full min-w-[540px]">
                <tbody>
                    @foreach ($posts as $post)
                        <tr class="hover:bg-sky-100 hover:text-white rounded-full">
                            <td class="py-2 ps-2 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    @if ($post->name->foto == '' || $post->name->foto == 'NULL')
                                        <a href="/dashboard/users/{{ $post->name->username }}">
                                            <svg class="w-7 h-7 text-gray-800 dark:text-white rounded-full ring-1 ring-offset-slate"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </a>
                                    @else
                                        <a href="/dashboard/users/{{ $post->name->username }}">
                                            <img src="{{ asset('storage/' . $post->name->foto) }}" alt=""
                                                class="object-cover w-7 h-7 rounded-full ring-1 ring-offset-slate">
                                        </a>
                                    @endif

                                </div>
                            </td>
                            <td class="py-2 px-1 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <a href="/dashboard/posts/{{ $post->slug }}"
                                        class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">{{ Str::limit($post->maksud, 50) }}</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">{{ $post->tempat_tujuan }}</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50 text-nowrap">
                                <span
                                    class="text-[13px] font-medium text-gray-400">{{ \Carbon\Carbon::parse($post->tgl_berangkat)->translatedFormat('d-m-Y') }}</span>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <div
            class="p-6 relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
            <div class="rounded-t mb-0 px-0 border-0">
                <div class="flex flex-wrap items-center px-4 py-2">
                    <div class="relative w-full max-w-full flex-grow flex-1">
                        <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Jumlah User</h3>
                    </div>
                </div>
                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Role</th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Jumlah</th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    Persentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-gray-700 dark:text-gray-100">
                                <th
                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                    Administrator</th>
                                <td
                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $totalAdmin }}</td>
                                <td
                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    <div class="flex items-center justify-between text-right">
                                        <div class="w-2/12">
                                            <span class="mr-2">{{ round($percentAdmin) }}%</span>
                                        </div>
                                        <div class="w-10/12">
                                            <div
                                                class="overflow-hidden h-2 text-xs flex rounded bg-{{ $colorAdmin }}-200">
                                                <div style="width: {{ round($percentAdmin) }}%"
                                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-{{ $colorAdmin }}-500">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-gray-700 dark:text-gray-100">
                                <th
                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                    User</th>
                                <td
                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $totalUser }}</td>
                                <td
                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    <div class="flex items-center justify-between text-right">
                                        <div class="w-2/12">
                                            <span class="mr-2">{{ round($percentUser) }}%</span>
                                        </div>
                                        <div class="w-10/12">
                                            <div
                                                class="overflow-hidden h-2 text-xs flex rounded bg-{{ $colorUser }}-200">
                                                <div style="width: {{ round($percentUser) }}%"
                                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-{{ $colorUser }}-500">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
            <div class="flex justify-between mb-4 items-start">
                <div class="font-medium">User Aktif</div>

            </div>
            <div class="overflow-hidden">
                <table class="w-full">
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="py-2 ps-2 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        @if ($user->foto == '' || $user->foto == 'NULL')
                                            <a href="/dashboard/users/{{ $user->username }}">
                                                <svg class="w-7 h-7 text-gray-800 dark:text-white rounded-full ring-1 ring-offset-slate"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                        @else
                                            <a href="/dashboard/users/{{ $user->username }}">
                                                <img src="{{ asset('storage/' . $user->foto) }}"
                                                    alt="{{ $user->username }}"
                                                    class="object-cover w-7 h-7 rounded-full ring-1 ring-offset-slate">
                                            </a>
                                        @endif
                                    </div>
                                </td>
                                <td class="py-2 px-1 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <a href="/dashboard/users/{{ $user->username }}""
                                            class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">{{ $user->name }}</a>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span
                                        class="text-[13px] font-medium text-gray-400">{{ \Carbon\Carbon::parse($user->updated_at)->translatedFormat('d-m-Y') }}</span>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 mb-6">
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2">
            <div class="flex justify-between mb-4 items-start">
                <div class="font-medium">Order Statistics</div>
                <div class="dropdown">
                    <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i
                            class="ri-more-fill"></i></button>
                    <ul
                        class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                        <li>
                            <a href="#"
                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                <div class="rounded-md border border-dashed border-gray-200 p-4">
                    <div class="flex items-center mb-0.5">
                        <div class="text-xl font-semibold">10</div>
                        <span
                            class="p-1 rounded text-[12px] font-semibold bg-blue-500/10 text-blue-500 leading-none ml-1">$80</span>
                    </div>
                    <span class="text-gray-400 text-sm">Active</span>
                </div>
                <div class="rounded-md border border-dashed border-gray-200 p-4">
                    <div class="flex items-center mb-0.5">
                        <div class="text-xl font-semibold">50</div>
                        <span
                            class="p-1 rounded text-[12px] font-semibold bg-emerald-500/10 text-emerald-500 leading-none ml-1">+$469</span>
                    </div>
                    <span class="text-gray-400 text-sm">Completed</span>
                </div>
                <div class="rounded-md border border-dashed border-gray-200 p-4">
                    <div class="flex items-center mb-0.5">
                        <div class="text-xl font-semibold">4</div>
                        <span
                            class="p-1 rounded text-[12px] font-semibold bg-rose-500/10 text-rose-500 leading-none ml-1">-$130</span>
                    </div>
                    <span class="text-gray-400 text-sm">Canceled</span>
                </div>
            </div>
            <div>
                <canvas id="order-chart"></canvas>
            </div>
        </div>

        {{-- <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
            <div class="flex justify-between mb-4 items-start">
                <div class="font-medium">Earnings</div>
                <div class="dropdown">
                    <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i
                            class="ri-more-fill"></i></button>
                    <ul
                        class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                        <li>
                            <a href="#"
                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full min-w-[460px]">
                    <thead>
                        <tr>
                            <th
                                class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
                                Service</th>
                            <th
                                class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">
                                Earning</th>
                            <th
                                class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">
                                Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt=""
                                        class="w-8 h-8 rounded object-cover block">
                                    <a href="#"
                                        class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                        landing page</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span
                                    class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt=""
                                        class="w-8 h-8 rounded object-cover block">
                                    <a href="#"
                                        class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                        landing page</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-rose-500">-$235</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span
                                    class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt=""
                                        class="w-8 h-8 rounded object-cover block">
                                    <a href="#"
                                        class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                        landing page</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span
                                    class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt=""
                                        class="w-8 h-8 rounded object-cover block">
                                    <a href="#"
                                        class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                        landing page</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-rose-500">-$235</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span
                                    class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt=""
                                        class="w-8 h-8 rounded object-cover block">
                                    <a href="#"
                                        class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                        landing page</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span
                                    class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt=""
                                        class="w-8 h-8 rounded object-cover block">
                                    <a href="#"
                                        class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                        landing page</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-rose-500">-$235</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span
                                    class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt=""
                                        class="w-8 h-8 rounded object-cover block">
                                    <a href="#"
                                        class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                        landing page</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span
                                    class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt=""
                                        class="w-8 h-8 rounded object-cover block">
                                    <a href="#"
                                        class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                        landing page</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-rose-500">-$235</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span
                                    class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt=""
                                        class="w-8 h-8 rounded object-cover block">
                                    <a href="#"
                                        class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                        landing page</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span
                                    class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt=""
                                        class="w-8 h-8 rounded object-cover block">
                                    <a href="#"
                                        class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                        landing page</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-rose-500">-$235</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span
                                    class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> --}}
    </div>

    {{-- <div id="chart">APEXCHART</div> --}}
</x-dashboard.layout>
