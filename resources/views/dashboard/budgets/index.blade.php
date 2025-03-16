<x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot>
    {{-- <x-dashboard.header>
        <div class="text-center">
            {{ $title }}
        </div>
    </x-dashboard.header> --}}

    <div class="container mx-auto p-2">

        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-3">
            <div class="bg-white shadow rounded p-6">
                <h2 class="text-lg font-semibold text-gray-700">Tahun Anggaran Berjalan</h2>
                <p class="text-2xl font-bold text-blue-500">
                    {{ $active->year }}
                </p>
            </div>
            <div class="bg-white shadow rounded p-6">
                <h2 class="text-lg font-semibold text-gray-700">Sisa Anggaran</h2>
                <p class="text-2xl font-bold text-orange-500">
                    Rp {{ number_format($active->remaining_budget, 0, ',', '.') }}
                </p>
            </div>
            <div class="bg-white shadow rounded p-6">
                <h2 class="text-lg font-semibold text-gray-700">Pengeluaran</h2>
                <p class="text-2xl font-bold text-red-500">
                    Rp {{ number_format($active->spend_budget, 0, ',', '.') }}
                </p>
            </div>
            <div class="bg-white shadow rounded p-6">
                <h2 class="text-lg font-semibold text-gray-700">Total Anggaran</h2>
                <p class="text-2xl font-bold text-emerald-500">
                    Rp {{ number_format($active->total_budget, 0, ',', '.') }}
                </p>
            </div>
        </div>

        <div class="bg-white shadow rounded py-3 px-6">

            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap justify-around -mb-px text-sm font-medium text-center" id="default-tab"
                    data-tabs-toggle="#default-tab-content" role="tablist">

                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 uppercase"
                            id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                            aria-controls="dashboard" aria-selected="false">Kategori Perjalanan</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 uppercase"
                            id="travel-component" data-tabs-target="#travel-components" type="button" role="tab"
                            aria-controls="travel-components" aria-selected="false">Komponen Perjalanan</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg uppercase" id="profile-tab"
                            data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">Anggaran Tahunan</button>
                    </li>
                </ul>
            </div>
            <div id="default-tab-content">
                <div class="hidden rounded-lg pb-5" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                    <div class="flex justify-between items-center my-3">
                        <h1 class="text-xl font-bold text-gray-800">Riwayat Anggaran</h1>
                        <a href="/budgets/categories/create"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Tambah Kategori Perjalanan
                        </a>
                    </div>
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                                <th class="w-12 py-3 px-6 text-left">Nama Kategori</th>
                                <th class="w-72 py-3 px-6 text-left">Deskripsi</th>
                                <th class="w-12 py-3 px-6 text-left">Dibuat pada</th>
                                <th class="w-20 py-3 px-6 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm">
                            @foreach ($travel_categories as $category)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left">
                                        {{ $category->name }}
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        {{ $category->description }}
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        {{ $category->created_at->format('d M Y') }}
                                    </td>
                                    <td class="py-3 px-6 text-center">

                                        <a href="/budgets/categories/{{ $category->name }}"
                                            class="text-blue-500 hover:underline">Detail</a>
                                        |
                                        <a href="/budgets/categories/{{ $category->name }}/edit"
                                            class="text-blue-500 hover:underline">Edit</a>
                                        |
                                        <form action="/budgets/categories/{{ $category->name }}" method="POST"
                                            class="inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="text-red-500 hover:underline"
                                                onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- TAB KOMPONEN PERJALANAN --}}
                <div class="hidden px-4 rounded-lg " id="travel-components" role="tabpanel"
                    aria-labelledby="travel-component">
                    <div class="flex justify-between">
                        <div class="flex justify-between items-center">
                            <h1 class="text-xl font-bold text-shadesOfBlue">Semua Kategori Perjalanan</h1>
                        </div>
                        <div>
                            <a href="/budgets/components">Lihat Semua</a>
                        </div>
                        <button id="dropdownUsersButton" data-dropdown-toggle="dropdownUsers"
                            data-dropdown-placement="bottom"
                            class="text-white bg-shadesOfBlue hover:bg-shadesOfBlue focus:ring-4 focus:outline-none focus:ring-shadesOfBlue font-medium rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center justify-between dark:bg-shadesOfBlue dark:hover:bg-shadesOfBlue dark:focus:ring-shadesOfBlue"
                            type="button">Kategori Perjalanan <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownUsers" class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                            <ul class="h-48 py-2 overflow-y-auto text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownUsersButton">
                                @foreach ($travel_categories as $category)
                                    <li>
                                        <div
                                            class="flex items-center px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            {{ $category->name }}
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                            <a href="#"
                                class="flex items-center p-3 text-sm font-medium text-shadesOfBlue border-t border-gray-200 rounded-b-lg bg-gray-50 dark:border-gray-600 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-blue-500 hover:underline">
                                <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 18">
                                    <path
                                        d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Zm11-3h-2V5a1 1 0 0 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 0 0 2 0V9h2a1 1 0 1 0 0-2Z" />
                                </svg>
                                Add new travel category
                            </a>
                        </div>
                    </div>

                    <div
                        class="my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300">
                    </div>
                    <div class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-6 sm:grid-cols-3 gap-10 my-16">
                        @foreach ($travel_components as $component)
                            <!-- card item -->
                            <div
                                class="group w-40 h-48 bg-white dark:bg-shadesOfBlue shadow-md relative rounded-lg m-4 hover:ring hover:ring-shadesOfBlue dark:hover:ring-white transform duration-500 hover:scale-105 hover:shadow-xl">
                                <div
                                    class="bg-shadesOfBlue flex justify-center items-center w-16 h-16 rounded-full absolute mx-auto right-0 left-0 -inset-y-11 border-4 border-slate-200 dark:border-slate-800 group-hover:bg-white dark:group-hover:bg-shadesOfBlue group-hover:shadow-md transform duration-300">
                                    <span
                                        class="text-2xl md:text-3xl text-white dark:text-slate-800 group-hover:text-shadesOfBlue dark:group-hover:text-white transform duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-10">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="flex flex-col items-center justify-center absolute mx-auto inset-0 p-4">
                                    <div>
                                        <h1
                                            class="text-lg text-center capitalize font-bold text-shadesOfBlue dark:text-slate-800 my-4">
                                            {{ $component->name }}</h1>
                                    </div>
                                    <div>
                                        <p class="text-center text-base dark:text-white">
                                            Rp. {{ number_format($component->amount, 0, ',', '.') }}
                                        </p>
                                    </div>
                                    <div class="w-28 text-center mt-10 border-2 bottom-0 border-shadesOfBlue dark:border-slate-800 dark:text-slate-800 p-1 px-3 capitalize text-xs text-shadesOfBlue rounded-md group-hover:bg-shadesOfBlue dark:group-hover:bg-slate-800 group-hover:text-white transform ease-in-out delay-75 opacity-85 hover:opacity-100"
                                        href="#">{{ $component->travel_category->name }}</div>
                                </div>
                            </div>
                            <!-- end card item -->
                        @endforeach
                    </div>
                </div>
                <div class="hidden rounded-lg mb-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="flex justify-between items-center my-3">
                        <h1 class="text-xl font-bold text-gray-800">Riwayat Anggaran</h1>
                        <a href="" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Tambah Anggaran Baru
                        </a>
                    </div>
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Tahun</th>
                                <th class="py-3 px-6 text-left">Total Anggaran</th>
                                <th class="py-3 px-6 text-left">Sisa Anggaran</th>
                                <th class="py-3 px-6 text-left">Tanggal Dibuat</th>
                                <th class="py-3 px-6 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm">
                            @foreach ($budgets as $budget)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left">
                                        {{ $budget->year }}
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        Rp {{ number_format($budget->total_budget, 0, ',', '.') }}
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        Rp {{ number_format($budget->remaining_budget, 0, ',', '.') }}
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        {{ $budget->created_at->format('d M Y') }}
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <a href="" class="text-blue-500 hover:underline">Edit</a>
                                        <form action="/dashboard/budgets{{ $budget->year }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline"
                                                onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>




</x-dashboard.layout>
