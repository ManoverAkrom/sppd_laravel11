<x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot>
    <x-dashboard.header>
        <div class="text-center">
            Laporan Keuangan SPPD
        </div>
    </x-dashboard.header>

    {{-- Search Bar --}}
    <div class="px-2 mx-auto w-full">
        <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                <div class="w-full md:w-1/2">
                    <form action="" method="GET" class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>

                        <div class="relative w-full">
                            <input type="text" id="simple-search" name="search"
                                class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Search">
                        </div>

                    </form>
                </div>
                <a href="{{ route('print.report') }}">
                    <button type="button"
                        class="flex text-white bg-gradient-to-r from-primary-400 via-primary-500 to-primary-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-primary-300 dark:focus:ring-primary-800 shadow-lg shadow-primary-500/50 dark:shadow-lg dark:shadow-primary-800/80 font-medium rounded-lg text-sm p-2 text-center m-1 print-report-button">
                        <svg class="w-[20px] h-[20px] text-white dark:text-white mx-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z" />
                        </svg>
                        <span class="me-2">Cetak Laporan</span>
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="px-2 mx-auto mt-1 w-full">
        <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <table class="min-w-full text-left text-sm whitespace-nowrap">
                <thead
                    class="text-wrap uppercase tracking-wider border-b-2 dark:border-neutral-600 bg-neutral-50 dark:bg-neutral-800">
                    <tr>
                        <th scope="col" class="w-10 ps-2 pe-1 py-3 text-center" onclick="sortTable(0)">#</th>
                        <th scope="col" class="w-40 px-2 py-3 text-center text-wrap" onclick="sortTable(1)">Nomor
                            SPPD <span class="sort-indicator" id="sort-indicator-1"></span></th>
                        <th scope="col" class="w-40 px-2 py-3 text-center" onclick="sortTable(2)">Nama yang
                            diperintah <span class="sort-indicator" id="sort-indicator-2"></span></th>
                        <th scope="col" class="w-40 px-2 py-3 text-center" onclick="sortTable(3)">Tujuan <span
                                class="sort-indicator" id="sort-indicator-3"></span></th>
                        <th scope="col" class="w-32 px-2 py-3 text-center" onclick="sortTable(4)">Tanggal Perjalanan
                            <span class="sort-indicator" id="sort-indicator-4"></span>
                        </th>
                        <th scope="col" class="w-24 px-2 py-3 text-center" onclick="sortTable(5)">Total Biaya <span
                                class="sort-indicator" id="sort-indicator-5"></span></th>
                        <th scope="col" class="w-32 px-2 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <div id="search-feedback" class="p-3 text-center text-red-500 hidden">No results found.</div>

                <tbody>
                    @foreach ($reports as $report)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                            <th scope="row" class="px-1 py-4 text-center border-r-2">{{ $loop->iteration }}</th>
                            <td class="ps-2 pe-1 py-3 text-left text-wrap border-1">{{ $report->sppd->no_spt }}</td>
                            <td class="ps-2 pe-1 py-3 text-left text-wrap border-1">{{ $report->sppd->name->name }}</td>
                            <td class="ps-2 pe-1 py-3 text-left text-wrap border-1">{{ $report->sppd->tempat_tujuan }}
                            </td>
                            <td class="ps-2 pe-1 py-3 text-left text-wrap border-1">
                                {{ \Carbon\Carbon::parse($report->tgl_berangkat)->translatedFormat('d F Y') }}</td>
                            <td class="ps-2 pe-1 py-3 text-center text-wrap border-1">
                                @if ($report->total_expenditure == null)
                                    Belum input pembiayaan
                                @else
                                    Rp. {{ number_format($report->total_expenditure, 0, ',', '.') }}
                                @endif
                            </td>
                            <td class="ps-2 pe-1 py-3 text-center text-wrap border-1">
                                @if ($report->total_expenditure == null)
                                    <a href="{{ route('outcomes.edit', $report->id) }}">
                                        <button type="button"
                                            class="text-white bg-gradient-to-r from-gray-400 via-gray-500 to-gray-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-300 dark:focus:ring-gray-800 shadow-lg shadow-gray-500/50 dark:shadow-lg dark:shadow-gray-800/80 font-medium rounded-lg text-sm p-1 text-center m-1 edit-biaya-button">
                                            <svg class="w-[20px] h-[20px] text-white dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                            </svg>
                                        </button>
                                    </a>
                                @else
                                    <button type="button"
                                        class="text-white bg-gradient-to-r from-indigo-500 via-indigo-600 to-indigo-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-indigo-300 dark:focus:ring-indigo-800 shadow-lg shadow-indigo-500/50 dark:shadow-lg dark:shadow-indigo-800/80 font-medium rounded-lg text-sm p-1 text-center m-1 rincian-biaya-button"
                                        data-sppd-id="{{ $report->sppd_id }}"
                                        data-kategori="{{ $report->kategori->name }}"
                                        data-komponen="{{ $report->komponen }}" data-biaya="{{ $report->biaya }}"
                                        data-total-biaya="{{ $report->total_expenditure }}">
                                        <svg class="w-[20px] h-[20px] text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-width="1.8"
                                                d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                            <path stroke="currentColor" stroke-width="1.8"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </button>

                                    <a href="{{ route('report.edit', ['id' => $report->id]) }}">
                                        <button type="button"
                                            class="text-white bg-gradient-to-r from-gray-400 via-gray-500 to-gray-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-300 dark:focus:ring-gray-800 shadow-lg shadow-gray-500/50 dark:shadow-lg dark:shadow-gray-800/80 font-medium rounded-lg text-sm p-1 text-center m-1 edit-biaya-button">
                                            <svg class="w-[20px] h-[20px] text-white dark:text-white"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                            </svg>
                                        </button>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tr>

                </tr>
            </table>
            <div class="p-6">
                {{ $reports->links() }}
            </div>
        </div>
    </div>
    {{-- Modal --}}
    <div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div id="modalContent"
            class="bg-white rounded-lg shadow-lg p-6 w-11/12 md:w-1/3 h-auto relative transition-all duration-300">
            <div class="absolute top-4 right-4 flex space-x-2">
                <button id="fullscreenToggle" class="text-gray-600 hover:text-blue-600 transition duration-200">
                    <i class="fas fa-expand me-2"></i>
                </button>
                <button id="closeModal" class="text-gray-600 hover:text-red-600 transition duration-200">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Rincian Data</h2>

            <div class="mb-4">
                <div class="flex">
                    <p id="kategori" class="font-semibold text-gray-800"></p>
                </div>
            </div>

            <div class="mb-4">
                <p class="font-semibold text-gray-700">Komponen dan Biaya:</p>
                <ul id="komponenList" class="list-disc pl-5">

                </ul>
            </div>

            <div class="flex justify-between mb-4">
                <p class="font-semibold text-gray-700">Total Biaya</p>
                <p id="totalBiaya" class="font-semibold text-gray-800"></p>
            </div>
        </div>
    </div>

</x-dashboard.layout>
