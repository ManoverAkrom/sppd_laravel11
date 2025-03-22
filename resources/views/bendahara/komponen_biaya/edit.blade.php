<x-dashboard.layout>
    <x-slot:title>Edit Komponen Biaya</x-slot>
    <x-dashboard.header>
        <div class="text-center">
            Edit Komponen Biaya
        </div>
    </x-dashboard.header>

    <div class="px-2 mx-auto w-full">
        <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <form action="{{ route('komponen_biaya.update', $komponenBiaya->kode) }}" method="POST" class="p-4">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="kategori_id" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                    <select id="kategori_id" name="kategori_id" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value=""></option>
                        @foreach ($kategoriBiayas as $kategori)
                            <option value="{{ $kategori->id }}"
                                {{ $komponenBiaya->kategori_id == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="nama_komponen" class="block text-sm font-medium text-gray-700">Nama Komponen</label>
                    <input type="text" id="nama_komponen" name="nama_komponen"
                        value="{{ $komponenBiaya->nama_komponen }}" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                </div>
                <div class="mb-4">
                    <label for="kode" class="block text-sm font-medium text-gray-700">Kode</label>
                    <input type="text" id="kode" name="kode" value="{{ $komponenBiaya->kode }}" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                </div>
                <div class="mb-4">
                    <label for="biaya" class="block text-sm font-medium text-gray-700">Biaya Perjalanan</label>
                    <input type="text" id="biaya" name="biaya" value="{{ $komponenBiaya->biaya }}" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6 mb-6">
                    <a href="{{ route('komponen_biaya.index') }}">
                        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                    </a>
                    <button type="submit"
                        class="rounded-md bg-blue-600 hover:bg-blue-700 px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-900">Update
                        Komponen</button>
                </div>
            </form>
        </div>
    </div>
</x-dashboard.layout>
