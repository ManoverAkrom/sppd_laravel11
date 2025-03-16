<x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot>
    <x-dashboard.header>
        <a href="/dashboard/categories">
            <div class="text-center">
                {{ $title }}
            </div>
        </a>
    </x-dashboard.header>

    <div class="flex">
        <div class="w-full">
            <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg me-2 p-2">
                <div class="mb-6">
                    @if ($institute->logo == null)
                        <div class="flex text-center justify-center">

                            <svg class="w-[175px] h-[175px] text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                                    clip-rule="evenodd" />
                            </svg>

                        </div>
                    @else
                        <div class="flex justify-center text-center mb-3 ">
                            <img src="{{ asset('storage/' . $institute->logo) }}" alt="{{ $institute->name }}"
                                width="175" height="175"
                                class="rounded-2xl border-dotted border-2 border-blue-500 hover:border-none p-1">
                        </div>
                    @endif

                </div>
                <!-- Table -->
                <table class="min-w-full text-left text-sm whitespace-nowrap">

                    <tbody>

                        <tr class="dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                            <th scope="row" class="w-10 px-2 py-4 text-left">
                                Nama Sekolah
                            </th>
                            <td scope="row" class="w-10 ps-2 pe-1 py-3 text-left text-wrap border-1">
                                : </td>
                            <td class="ps-2 pe-1 py-3 text-left text-wrap border-1">
                                {{ $institute->name }}
                            </td>
                        </tr>
                        <tr class="dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                            <th scope="row" class="w-10 px-2 py-4 text-left">
                                NPSN
                            </th>
                            <td scope="row" class="w-10 ps-2 pe-1 py-3 text-left text-wrap border-1">
                                : </td>
                            <td class="ps-2 pe-1 py-3 text-left text-wrap border-1">
                                {{ $institute->npsn }}
                            </td>
                        </tr>
                        <tr class="dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                            <th scope="row" class="w-10 px-2 py-4 text-left">
                                Status
                            </th>
                            <td scope="row" class="w-10 ps-2 pe-1 py-3 text-left text-wrap border-1">
                                : </td>
                            <td class="ps-2 pe-1 py-3 text-left text-wrap border-1 ">
                                {{ $institute->status }}
                            </td>
                        </tr>
                        <tr class="dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                            <th scope="row" class="w-10 px-2 py-4 text-left">
                                Alamat
                            </th>
                            <td scope="row" class="w-10 ps-2 pe-1 py-3 text-left text-wrap border-1">
                                : </td>
                            <td class="ps-2 pe-1 py-3 text-left text-wrap border-1 ">
                                {{ $institute->address }}
                            </td>
                        </tr>
                        <tr class="dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                            <th scope="row" class="w-10 px-2 py-4 text-left">
                                Email
                            </th>
                            <td scope="row" class="w-10 ps-2 pe-1 py-3 text-left text-wrap border-1">
                                : </td>
                            <td class="ps-2 pe-1 py-3 text-left text-wrap border-1 ">
                                {{ $institute->email }}
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>



</x-dashboard.layout>
