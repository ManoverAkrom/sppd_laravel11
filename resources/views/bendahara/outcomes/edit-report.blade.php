<x-dashboard.layout>
    <x-slot:title>Edit Report</x-slot>
    <x-dashboard.header>
        <div class="text-center uppercase">
            Edit Laporan Keuangan SPPD
        </div>
    </x-dashboard.header>

    <div class="px-2 mx-auto w-full">
        <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <form action="{{ route('report.update', ['id' => $outcome->id]) }}" method="POST" class="p-4">
                @csrf
                @method('PUT')
                <input type="hidden" name="sppd_id" value="{{ $outcome->sppd_id }}">
                <div class="mb-4">
                    <label for="kategori_id" class="block text-md font-medium text-gray-700">Kategori Perjalanan</label>
                    <select id="kategori_id" name="kategori_id" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value=""></option>
                        @foreach ($categories as $kategori)
                            <option value="{{ $kategori->id }}"
                                {{ $kategori->id == $outcome->kategori_id ? 'selected' : '' }}>
                                {{ $kategori->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-6">
                    <button type="button" id="add-component"
                        class="rounded-md bg-green-600 hover:bg-green-700 px-3 py-2 text-sm font-semibold text-white shadow-sm">Tambah
                        Komponen</button>
                </div>
                <table class="table table-bordered" id="table">
                    <tr>
                        <th class="w-72 text-left text-md font-medium text-gray-700">Komponen Perjalanan</th>
                        <th class="w-56 text-left text-md font-medium text-gray-700">Biaya</th>
                        <th class="text-left block text-md font-medium text-gray-700">Action</th>
                    </tr>
                    @foreach ($relatedOutcomes as $index => $relatedOutcome)
                        <tr>
                            <td class="pe-3">
                                <input type="text" name="inputs[{{ $index }}][komponen]"
                                    placeholder="Masukkan Komponen"
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ $relatedOutcome->komponen }}" required>
                                <input type="hidden" name="inputs[{{ $index }}][id]"
                                    value="{{ $relatedOutcome->id }}">
                                <input type="hidden" name="inputs[{{ $index }}][kategori_id]"
                                    value="{{ $relatedOutcome->kategori_id }}">
                            </td>
                            <td class="pe-3">
                                <input type="text" name="inputs[{{ $index }}][biaya]"
                                    placeholder="Masukkan Biaya"
                                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ $relatedOutcome->biaya }}" required>
                            </td>
                            <td>
                                <button type="button"
                                    class="remove-table-row rounded-md bg-red-600 hover:bg-red-700 px-3 py-2 text-sm font-semibold text-white shadow-sm">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </table>

                <div class="mt-6 flex items-center justify-end gap-x-3 mb-6">
                    <a href="/dashboard/outcomes">
                        <button type="button"
                            class="rounded-md bg-rose-600 hover:bg-rose-700 px-3 py-2 text-sm font-semibold text-white shadow-sm">Cancel</button>
                    </a>
                    <button type="submit"
                        class="rounded-md bg-blue-600 hover:bg-blue-700 px-3 py-2 text-sm font-semibold text-white shadow-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script src="/js/report.js"></script>
</x-dashboard.layout>
