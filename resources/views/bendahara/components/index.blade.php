<x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="bg-white shadow rounded py-3 px-6">


        <div id="default-tab-content">
            <div class="rounded-lg pb-5" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                <div class="flex justify-between items-center my-3">
                    <h1 class="text-xl font-bold text-gray-800">Riwayat Anggaran</h1>
                    <a href="/bendahara/components/create"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Tambah Kategori Perjalanan
                    </a>
                </div>

                <table class="min-w-full text-left text-sm whitespace-nowrap">

                    <!-- Table head -->
                    <thead
                        class="text-wrap uppercase tracking-wider border-b-2 dark:border-neutral-600 bg-neutral-50 dark:bg-neutral-800">
                        <tr>
                            <th scope="col" class="w-10 ps-2 pe-1 py-3 text-center">
                                #
                            </th>
                            <th scope="col" class="w-10 px-2 py-3 text-center text-wrap">
                                Nama Komponen
                            </th>
                            <th scope="col" class="px-2 py-3 text-left">
                                Kode
                            </th>
                            <th scope="col" class="px-2 py-3 text-left">
                                Biaya
                            </th>
                            <th scope="col" class="px-2 py-3 text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <!-- Table body -->
                    <tbody>

                        @foreach ($komponenBiaya as $komponen)
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                                <th scope="row" class="w-10 px-1 py-4 text-center border-r-2">
                                    {{ $loop->iteration }}
                                </th>
                                <td scope="row" class="w-10 ps-2 pe-1 py-3 text-left text-wrap border-1">
                                    {{ $komponen->nama_komponen }}</td>
                                <td class="ps-2 pe-1 py-3 text-left text-wrap border-1 uppercase">{{ $komponen->kode }}
                                </td>
                                <td class="ps-2 pe-1 py-3 text-left text-wrap border-1 capitalize">
                                    {{ $komponen->transaction }}
                                </td>
                                <td class="w-10 ps-2 pe-1 py-3 text-center text-wrap border-1">
                                    <span
                                        class="bg-{{ $komponen->color }}-100 text-gray-500 text-xs font-medium items-center px-3 py-1 rounded-xl dark:bg-gray-200 dark:text-gray-500 text-center">
                                        {{ $komponen->color }}
                                    </span>
                                </td>

                                <td class="w-38 px-2 py-3 text-center text-wrap">
                                    <a href="/dashboard/categories/{{ $komponen->code }}">
                                        <button type="button"
                                            class="text-white bg-gradient-to-r from-indigo-500 via-indigo-600 to-indigo-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-indigo-300 dark:focus:ring-indigo-800 shadow-lg shadow-indigo-500/50 dark:shadow-lg dark:shadow-indigo-800/80 font-medium rounded-lg text-sm p-1 text-center m-1 ">
                                            <svg class="w-[20px] h-[20px] text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-width="1.8"
                                                    d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                <path stroke="currentColor" stroke-width="1.8"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </button>
                                    </a>
                                    <a href="/dashboard/categories/{{ $komponen->code }}/edit">
                                        <button type="button"
                                            class="text-white bg-gradient-to-r from-gray-400 via-gray-500 to-gray-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-300 dark:focus:ring-gray-800 shadow-lg shadow-gray-500/50 dark:shadow-lg dark:shadow-gray-800/80 font-medium rounded-lg text-sm p-1 text-center m-1 ">
                                            <svg class="w-[20px] h-[20px] text-white dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                            </svg>

                                        </button>
                                    </a>

                                    <form action="/dashboard/categories/{{ $komponen->code }}" method="post"
                                        class="inline">
                                        @method('delete')
                                        @csrf
                                        <button
                                            class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm p-1 text-center m-1"
                                            onclick="return confirm('Yakin mau dihapus?')">
                                            <span class="bi bi-trash3">
                                                <svg class="w-[20px] h-[20px] text-white dark:text-white"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                </svg>
                                            </span>
                                        </button>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- tabel generate --}}
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                            <th class="w-60 py-3 px-6 text-left">Nama</th>
                            <th class="w-12 py-3 px-6 text-left">Besaran Biaya</th>
                            <th class="w-12 py-3 px-6 text-left">Kategori</th>
                            <th class="w-20 py-3 px-6 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm">
                        @foreach ($components as $component)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">
                                    {{ $component->name }}
                                </td>
                                <td class="py-3 px-6 text-left">
                                    {{ $component->amount }}
                                </td>
                                <td class="py-3 px-6 text-left">
                                    {{-- {{ $component->finance_category->name }} --}}
                                </td>
                                <td class="py-3 px-6 text-center text-nowrap">

                                    <a href="/bendahara/components/{{ $component->slug }}"
                                        class="text-green-500 hover:underline">Detail</a>
                                    |
                                    <a href="/bendahara/components/{{ $component->name }}/edit"
                                        class="text-blue-500 hover:underline">Edit</a>
                                    |
                                    <form action="/bendahara/components/{{ $component->id }}" method="POST"
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

        </div>
    </div>

    </div>

</x-dashboard.layout>
