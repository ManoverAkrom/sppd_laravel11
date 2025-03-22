<x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot>
    <x-dashboard.header>
        <div class="text-center">
            Input Pembiayaan SPPD nomor {{ $outcome->sppd->no_spt }} a.n. {{ $outcome->sppd->name->name }}
        </div>
    </x-dashboard.header>

    <div class="px-2 mx-auto w-full">
        <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <form action="{{ route('outcomes.update', $outcome->id) }}" method="POST" class="p-4">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="kategori_id" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                    <select id="kategori_id" name="kategori_id" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value=""></option>
                        @foreach ($categories as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                        @endforeach
                    </select>
                </div>
                <table class="table table-bordered" id="table">
                    <tr>
                        <th>Komponen Perjalanan</th>
                        <th>Biaya</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="inputs[0][komponen]" placeholder="Pilih Komponen Perjalanan"
                                class="form-control">
                        </td>
                        <td>
                            <input type="text" name="inputs[0][biaya]" placeholder="Pilih Komponen Perjalanan"
                                class="form-control">
                        </td>
                        <td><button type="button" name="add" id="add"
                                class="rounded-md bg-blue-600 hover:bg-blue-700 px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-900">Add
                                More</button></td>
                    </tr>
                </table>
                <script>
                    var i = 0;
                    $('#add').click(function() {
                        ++i;
                        $('#table').append(
                            `<tr>
                                <td>
                                    <input type="text" name="inputs[` + i + `][komponen]" placeholder="Pilih Komponen" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="inputs[` + i + `][biaya]" placeholder="Masukkan Biaya"
                                        class="form-control">
                                </td>
                                <td>
                                    <button type="button" class="remove-table-row">Remove</button>
                                </td>
                                
                            </tr>`);
                    });
                    $(document).on('click', '.remove-table-row', function() {
                        $(this).parents('tr').remove();
                    })
                </script>

                {{-- <div class="mb-4">
                    <label for="komponen" class="block text-sm font-medium text-gray-700">Komponen Perjalanan</label>
                    <select id="komponen" name="komponen[]" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value=""></option>
                        @foreach ($components as $komponen)
                            <option value="{{ $komponen->name }}">{{ $komponen->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="biaya" class="block text-sm font-medium text-gray-700">Biaya Perjalanan</label>
                    <input type="text" id="biaya" name="biaya" value="" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                </div> --}}
                <div class="mt-6 flex items-center justify-end gap-x-6 mb-6">
                    <a href="/dashboard/outcomes">
                        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                    </a>
                    <button type="submit"
                        class="rounded-md bg-blue-600 hover:bg-blue-700 px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-900">Simpan</button>
                </div>
            </form>
        </div>
    </div>



    </x-dahboard.layout>
