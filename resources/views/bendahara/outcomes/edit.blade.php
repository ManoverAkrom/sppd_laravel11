<x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot>
    <x-dashboard.header>
        <div class="text-center uppercase">
            Input Pembiayaan
        </div>
    </x-dashboard.header>

    <div class="px-2 mx-auto w-full">
        <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">

            <div
                class="items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4 overflow-x-auto">

                <table class="min-w-full text-left text-sm whitespace-nowrap">

                    <tbody>
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                            <th scope="row" class="w-10 px-2 py-2 text-left">
                                Nomor SPT
                            </th>
                            <td scope="row" class="w-10 ps-2 pe-1 text-left text-wrap border-1">
                                : </td>
                            <td class="ps-2 pe-1 text-left text-wrap border-1 uppercase">
                                {{ $outcome->sppd->no_spt }}
                            </td>

                            <th scope="row" class="w-10 px-2 text-left">
                                Tanggal SPT
                            </th>
                            <td scope="row" class="w-10 ps-2 pe-1 text-left text-wrap border-1">
                                : </td>
                            <td class="ps-2 pe-1 text-left text-wrap border-1">
                                {{ \Carbon\Carbon::parse($outcome->sppd->tgl_spt)->translatedFormat('d F Y') }}</td>
                            </td>
                        </tr>

                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                            <th scope="row" class="w-10 px-2 py-2 text-left">
                                Nama
                            </th>
                            <td scope="row" class="w-10 ps-2 pe-1 text-left text-wrap border-1">
                                : </td>
                            <td class="ps-2 pe-1 text-left text-wrap border-1 uppercase">
                                {{ $outcome->sppd->name->name }}
                            </td>

                            <th scope="row" class="w-10 px-2 text-left">
                                NIP
                            </th>
                            <td scope="row" class="w-10 ps-2 pe-1 text-left text-wrap border-1">
                                : </td>
                            <td class="ps-2 pe-1 text-left text-wrap border-1">
                                {{ $outcome->sppd->name->nip }}
                            </td>
                        </tr>

                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                            <th scope="row" class="w-10 px-2 py-2 text-left">
                                Tujuan
                            </th>
                            <td scope="row" class="w-10 ps-2 pe-1 text-left text-wrap border-1">
                                : </td>
                            <td class="ps-2 pe-1 text-left text-wrap border-1">
                                {{ $outcome->sppd->tempat_tujuan }}
                            </td>

                            <th scope="row" class="w-10 px-2 text-left">
                                Kepentingan
                            </th>
                            <td scope="row" class="w-10 ps-2 pe-1 text-left text-wrap border-1">
                                : </td>
                            <td class="ps-2 pe-1 text-left text-wrap border-1">
                                {{ $outcome->sppd->maksud }}
                            </td>
                        </tr>

                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                            <th scope="row" class="w-10 px-2 py-2 text-left">
                                Tanggal Berangkat
                            </th>
                            <td scope="row" class="w-10 ps-2 pe-1 text-left text-wrap border-1">
                                : </td>
                            <td class="ps-2 pe-1 text-left text-wrap border-1 ">
                                {{ \Carbon\Carbon::parse($outcome->sppd->tgl_berangkat)->translatedFormat('d F Y') }}
                            </td>
                            </td>

                            <th scope="row" class="w-10 px-2 text-left">
                                Tanggal Kembali
                            </th>
                            <td scope="row" class="w-10 ps-2 pe-1 text-left text-wrap border-1">
                                : </td>
                            <td class="ps-2 pe-1 text-left text-wrap border-1">
                                {{ \Carbon\Carbon::parse($outcome->sppd->tgl_kembali)->translatedFormat('d F Y') }}
                            </td>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <form action="{{ route('outcomes.update', $outcome->id) }}" method="POST" class="p-4">
                @csrf
                @method('PUT')
                <input type="hidden" name="sppd_id" value="{{ $outcome->sppd_id }}">
                <input type="hidden" name="selected_kategori_id" id="selected_kategori_id" value="">

                <div class="mb-4">
                    <label for="kategori_id" class="block text-md font-medium text-gray-700">Kategori Perjalanan</label>
                    <select id="kategori_id" name="kategori_id" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        onchange="setSelectedKategori(this.value)">
                        <option value=""></option>
                        @foreach ($categories as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                        @endforeach
                    </select>
                </div>
                <table class="table table-bordered" id="table">
                    <tr>
                        <th class=" w-72 text-left text-md font-medium text-gray-700">Komponen Perjalanan</th>
                        <th class=" w-56 text-left text-md font-medium text-gray-700">Biaya</th>
                        <th class="text-left block text-md font-medium text-gray-700">Action</th>
                    </tr>
                    <tr>
                        <td class="pe-3">
                            <select name="inputs[0][komponen]"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                <option value=""></option>
                            </select>
                        </td>
                        <td class="pe-3">
                            <input type="text" name="inputs[0][biaya]" id="biaya"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                value="{{ old('inputs.0.biaya', $outcome->biaya) }}" placeholder="Masukkan biaya"
                                required>
                        </td>
                        <td>
                            <input type="hidden" name="inputs[0][kategori_id]" value="">
                            <button type="button" name="add" id="add"
                                class="rounded-md bg-sky-600 hover:bg-sky-700 px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-900">Tambah
                                Komponen</button>
                        </td>
                    </tr>
                </table>

                <div class="mt-6 flex items-center justify-end gap-x-3 mb-6">
                    <a href="/dashboard/outcomes">
                        <button type="button"
                            class="rounded-md bg-rose-600 hover:bg-rose-700 px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-rose-900">Cancel</button>
                    </a>
                    <button type="submit"
                        class="rounded-md bg-blue-600 hover:bg-blue-700 px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-900">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        var i = 0;
        $('#add').click(function() {
            ++i;
            $('#table').append(
                `<tr>
                <td class="pe-3">
                    <select name="inputs[` + i + `][komponen]" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white>
                        <option value="">Pilih Komponen</option>
                        <!-- Options will be populated based on selected category -->
                    </select>
                </td>
                <td class="pe-3">
                    <input type="text" name="inputs[` + i + `][biaya]" placeholder="Masukkan Biaya" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                </td>
                <td>
                    <button type="button" class="remove-table-row rounded-md bg-red-600 hover:bg-red-700 px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-900">Hapus</button>
                </td>

                </tr>`);

            // Populate the new component dropdown based on the selected category
            const selectedKategoriId = $('#kategori_id').val();
            fetch(`/get-components/${selectedKategoriId}`)
                .then(response => response.json())
                .then(data => {
                    const componentSelect = $(`select[name="inputs[${i}][komponen]"]`);
                    data.forEach(component => {
                        componentSelect.append(new Option(component.name, component.id));
                    });
                });
        });

        $(document).on('change', 'select[name^="inputs"][name$="[komponen]"]', function() {
            const selectedComponentId = $(this).val();
            const biayaInput = $(this).closest('tr').find('input[name^="inputs"][name$="[biaya]"]');

            // Fetch the biaya based on the selected component
            fetch(`/get-biaya/${selectedComponentId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.biaya) {
                        biayaInput.val(data.biaya); // Assuming 'biaya' is the field in the response
                    } else {
                        biayaInput.val(''); // Clear the input if no biaya is found
                    }
                });
        });

        $(document).on('click', '.remove-table-row', function() {
            $(this).parents('tr').remove();
        });
    </script>
</x-dashboard.layout>
