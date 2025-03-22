<x-dashboard.layout>
    <x-slot:title>SPPD Entries</x-slot>
    <x-dashboard.header>
        <div class="text-center">
            SPPD Entries that have not been calculated
        </div>
    </x-dashboard.header>

    {{-- Search Bar --}}
    <div class="px-2 mx-auto w-full">
        <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                <div class="w-full md:w-1/2">
                    <form action="{{ route('outcomes.index') }}" method="GET" class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div id="search-feedback" class="text-red-500 hidden">No results found.</div>

                        <div class="relative w-full">
                            <input type="text" id="simple-search" name="search"
                                class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="px-2 mx-auto mt-1 w-full">
        <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <table class="min-w-full text-left text-sm whitespace-nowrap">
                <thead
                    class="text-wrap uppercase tracking-wider border-b-2 dark:border-neutral-600 bg-neutral-50 dark:bg-neutral-800">
                    <tr>
                        <th scope="col" class="w-10 ps-2 pe-1 py-3 text-center">#</th>
                        <th scope="col" class="w-40 px-2 py-3 text-center text-wrap">Nomor SPPD</th>
                        <th scope="col" class="w-40 px-2 py-3 text-center">Nama yang diperintah</th>
                        <th scope="col" class="w-40 px-2 py-3 text-center">Tujuan</th>
                        <th scope="col" class="w-32 px-2 py-3 text-center">Tanggal Perjalanan</th>
                        <th scope="col" class="w-24 px-2 py-3 text-center">Status</th>
                        <th scope="col" class="w-32 px-2 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sppdEntries as $sppd)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                            <th scope="row" class="px-1 py-4 text-center border-r-2">{{ $loop->iteration }}</th>
                            <td class="ps-2 pe-1 py-3 text-left text-wrap border-1">{{ $sppd->sppd->no_spt }}</td>
                            <td class="ps-2 pe-1 py-3 text-left text-wrap border-1">{{ $sppd->sppd->name->name }}</td>
                            <td class="ps-2 pe-1 py-3 text-left text-wrap border-1">{{ $sppd->sppd->tempat_tujuan }}
                            </td>
                            <td class="ps-2 pe-1 py-3 text-left text-wrap border-1">
                                {{ \Carbon\Carbon::parse($sppd->tgl_berangkat)->translatedFormat('d F Y') }}</td>
                            <td class="ps-2 pe-1 py-3 text-center text-wrap border-1">{{ $sppd->sppd->status }}</td>
                            <td class="ps-2 pe-1 py-3 text-center text-wrap border-1">
                                <a href="{{ route('outcomes.edit', $sppd->id) }}">
                                    Proses
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-6">
                {{ $sppdEntries->links() }}
            </div>
        </div>
    </div>
</x-dashboard.layout>
