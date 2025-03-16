<x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="bg-white shadow rounded py-3 px-6">


        <div id="default-tab-content">
            <div class="rounded-lg pb-5" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                <div class="flex justify-between items-center my-3">
                    <h1 class="text-xl font-bold text-gray-800">Riwayat Anggaran</h1>
                    <a href="/finance/components/create"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Tambah Kategori Perjalanan
                    </a>
                </div>
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
                                    {{ $component->finance_category->name }}
                                </td>
                                <td class="py-3 px-6 text-center text-nowrap">

                                    <a href="/finance/components/{{ $component->id }}"
                                        class="text-green-500 hover:underline">Detail</a>
                                    |
                                    <a href="/finance/components/{{ $component->name }}/edit"
                                        class="text-blue-500 hover:underline">Edit</a>
                                    |
                                    <form action="/finance/components/{{ $component->id }}" method="POST"
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
