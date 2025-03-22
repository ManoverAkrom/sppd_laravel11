<x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot>
    <x-dashboard.header>
        <div class="text-center">
            {{ $title }}
        </div>
    </x-dashboard.header>

    {{-- Search Bar --}}
    <div class="px-2 mx-auto w-full">
        <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                <div class="w-full md:w-1/2">
                    <form action="{{ route('kategori_biaya.index') }}" method="GET" class="flex items-center"
                        onsubmit="event.preventDefault(); searchCategories();">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div id="search-feedback" class="text-red-500 hidden">No results found.</div>

                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search" name="search" oninput="searchCategories()"
                                class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Search" required="">
                        </div>
                    </form>
                </div>
                <div
                    class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                    <a href="/dashboard/kategori_biaya/create">
                        <button type="button"
                            class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            Tambah Kategori
                        </button>
                    </a>
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
                        <th scope="col" class="w-96 px-2 py-3 text-center text-wrap">Kategori</th>
                        <th scope="col" class="w-60 px-2 py-3 text-center text-wrap">Kode</th>
                        <th scope="col" class="w-60 px-2 py-3 text-center">Warna</th>
                        <th scope="col" class="max-w-20 px-2 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody id="category-table-body">
                    @foreach ($categories as $category)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                            <th scope="row" class="w-10 px-1 py-4 text-center border-r-2">{{ $loop->iteration }}</th>
                            <td class="ps-2 pe-1 py-3 text-left text-wrap border-1 uppercase">{{ $category->name }}</td>
                            <td class="w-10 ps-2 pe-1 py-3 text-left text-wrap border-1">{{ $category->code }}</td>
                            <td class="w-10 ps-2 pe-1 py-3 text-center text-wrap border-1">
                                <span
                                    class="bg-{{ $category->color }}-100 text-gray-500 text-xs font-medium items-center px-3 py-1 rounded-xl dark:bg-gray-200 dark:text-gray-500 text-center">{{ $category->color }}</span>
                            </td>
                            <td class="w-38 px-2 py-3 text-center text-wrap">
                                <button type="button"
                                    onclick="document.getElementById('modal{{ $loop->iteration }}').classList.remove('hidden'); document.body.classList.add('blur-sm')"
                                    class="text-white bg-gradient-to-r from-indigo-500 via-indigo-600 to-indigo-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-indigo-300 dark:focus:ring-indigo-800 shadow-lg shadow-indigo-500/50 dark:shadow-lg dark:shadow-indigo-800/80 font-medium rounded-lg text-sm p-1 text-center m-1">Show</button>
                                <a href="/dashboard/kategori_biaya/{{ $category->code }}/edit">
                                    <button type="button"
                                        class="text-white bg-gradient-to-r from-gray-400 via-gray-500 to-gray-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-300 dark:focus:ring-gray-800 shadow-lg shadow-gray-500/50 dark:shadow-lg dark:shadow-gray-800/80 font-medium rounded-lg text-sm p-1 text-center m-1">Edit</button>
                                </a>
                                <form action="/dashboard/kategori_biaya/{{ $category->code }}" method="post"
                                    class="inline">
                                    @method('delete')
                                    @csrf
                                    <button
                                        class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm p-1 text-center m-1"
                                        onclick="return confirm('Yakin mau dihapus?')">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal for showing category details -->
                        <div class="fixed inset-0 flex items-center justify-center hidden"
                            id="modal{{ $loop->iteration }}">
                            <div class="bg-white rounded-lg shadow-md p-6 border border-gray-300">
                                <h2 class="text-xl font-bold mb-4 text-center">Category Details</h2>
                                <div id="modalContent">
                                    <strong class="text-gray-800">Nama Kategori:</strong> <span
                                        class="text-gray-700">{{ $category->name }}</span><br>
                                    <strong class="text-gray-800">Kode:</strong> <span
                                        class="bg-{{ $category->color }}-100 text-gray-500 text-xs font-medium items-center px-3 py-1 rounded-xl dark:bg-gray-200 dark:text-gray-500 text-center">{{ $category->code }}</span>
                                </div>
                                <button
                                    class="mt-4 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-200"
                                    onclick="document.getElementById('modal{{ $loop->iteration }}').classList.add('hidden'); document.body.classList.remove('blur-sm')">Close</button>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard.layout>

<script>
    function searchCategories() {
        const query = document.getElementById('simple-search').value;
        const url = "{{ route('kategori_biaya.index') }}?search=" + query;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
                document.getElementById('category-table-body').innerHTML = data;
                if (data.trim() === '') {
                    document.getElementById('search-feedback').classList.remove('hidden');
                } else {
                    document.getElementById('search-feedback').classList.add('hidden');
                }
            })

            .then(response => response.text())
            .then(data => {
                document.getElementById('category-table-body').innerHTML = data;
            });
    }
</script>
