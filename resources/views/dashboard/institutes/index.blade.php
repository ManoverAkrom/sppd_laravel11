{{-- <x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot>
    <x-dashboard.header>
        <div class="text-center">
            {{ $title }}
        </div>
    </x-dashboard.header>

    <div class="px-2 mx-auto w-full">
        <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            Daftar Tahun Ajaran
        </div>
    </div>

</x-dashboard.layout> --}}

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
            <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg me-2 p-5">
                <div class="mb-6">
                    @if ($institute->logo == null)
                        <div class="flex text-center justify-center ">

                            <svg class="w-[175px] h-[175px] text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M4 4a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2v14a1 1 0 1 1 0 2H5a1 1 0 1 1 0-2V5a1 1 0 0 1-1-1Zm5 2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-1Zm-5 4a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1Zm-3 4a2 2 0 0 0-2 2v3h2v-3h2v3h2v-3a2 2 0 0 0-2-2h-2Z"
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
                        <tr class="dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                            <th scope="row" class="w-10 px-2 py-4 text-left">
                                Telepon
                            </th>
                            <td scope="row" class="w-10 ps-2 pe-1 py-3 text-left text-wrap border-1">
                                : </td>
                            <td class="ps-2 pe-1 py-3 text-left text-wrap border-1 ">
                                {{ $institute->phone }}
                            </td>
                        </tr>
                        <tr class="dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                            <th scope="row" class="w-10 px-2 py-4 text-left">
                                Website
                            </th>
                            <td scope="row" class="w-10 ps-2 pe-1 py-3 text-left text-wrap border-1">
                                : </td>
                            <td class="ps-2 pe-1 py-3 text-left text-wrap border-1 ">
                                {{ $institute->website }}
                            </td>
                        </tr>
                        <tr class="dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                            <th scope="row" class="w-10 px-2 py-4 text-left">
                                Kepala Sekolah
                            </th>
                            <td scope="row" class="w-10 ps-2 pe-1 py-3 text-left text-wrap border-1">
                                : </td>
                            <td class="ps-2 pe-1 py-3 text-left text-wrap border-1 ">
                                {{ $institute->master_name }}
                            </td>
                        </tr>
                        <tr class="dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                            <th scope="row" class="w-10 px-2 py-4 text-left">
                                NIP Kepala Sekolah
                            </th>
                            <td scope="row" class="w-10 ps-2 pe-1 py-3 text-left text-wrap border-1">
                                : </td>
                            <td class="ps-2 pe-1 py-3 text-left text-wrap border-1 ">
                                {{ $institute->master_nip }}
                            </td>
                        </tr>

                        <tr class="dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                            <th scope="row" class="w-10 px-2 py-4 text-left">
                                Tahun Ajaran
                            </th>
                            <td scope="row" class="w-10 ps-2 pe-1 py-3 text-left text-wrap border-1">
                                : </td>
                            <td class="ps-2 pe-1 py-3 text-left text-wrap border-1 ">
                                {{ $institute->tahun_ajaran }}
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>



</x-dashboard.layout>
