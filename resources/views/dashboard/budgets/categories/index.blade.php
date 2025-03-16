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
                        <a href="/dashboard/budgets/categories/create"
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
                                        <a href="" class="text-blue-500 hover:underline">Edit</a>
                                        <form action="" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline"
                                                onclick="return confirm('Apakah Anda yakin?')">Arsipkan</button>
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
