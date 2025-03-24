<x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot>
    <x-dashboard.header>
        <div class="text-center">
            Create Multiple Outcomes
        </div>
    </x-dashboard.header>

    <div class="px-2 mx-auto w-full">
        <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <form action="{{ route('outcomes.store') }}" method="POST" class="p-4">
                @csrf
                <div class="mb-4">
                    <label for="kategori_id" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                    <select id="kategori_id" name="kategori_id" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value=""></option>
                        @foreach ($kategoriBiayas as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                        @endforeach
                    </select>
                </div>
                <table class="table table-bordered" id="table" data-sppd-id="{{ request()->get('sppd_id') }}"
                    data-sppd-name="{{ request()->get('name') }}">

                    <tr>
                        <th>Komponen Perjalanan</th>
                        <th>Biaya</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="inputs[0][komponen]" placeholder="Pilih Komponen Perjalanan"
                                value="{{ request()->get('name') }}" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="inputs[0][biaya]" placeholder="Masukkan Biaya"
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

                <!-- Removed hidden input for sppd_slug -->

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
</x-dashboard.layout>
