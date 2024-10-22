<x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot>
    <x-dashboard.header>
        <div class="text-center">
            {{ $title }}
        </div>
    </x-dashboard.header>

    <div class="px-2 mx-auto w-full">
        <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <div class="flex flex-col items-center justify-center p-12 space-y-3 md:flex-row md:space-y-0 md:space-x-4">

                <div class="min-w-full whitespace-nowrap">
                    <form method="post" action="/dashboard/posts" enctype="multipart/form-data">
                        @csrf
                        {{-- Sumber Surat --}}
                        <div class="part mb-3 pb-3 border-bottom">
                            <div class="title-part text-lg mb-3">
                                Dasar Perjalanan Dinas
                            </div>

                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="sumber">
                                        Sumber
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('sumber') border-1 border-red-500 @else border-0 @enderror"
                                        id="sumber" value="{{ old('sumber') }}" name="sumber" type="text">

                                    @error('sumber')
                                        <div class="text-red-500">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="w-full md:w-1/4 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="instansi">
                                        Instansi
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('instansi') is-invalid @enderror"
                                        id="instansi" type="text" placeholder="Tulis Lengkap (Bukan Singkatan)"
                                        name="instansi" value="{{ old('instansi') }}">
                                </div>
                                <div class="w-full md:w-1/4 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="no_surat_sumber">
                                        Nomor Surat
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="no_surat_sumber" type="text" placeholder="" name="no_surat_sumber"
                                        value="{{ old('no_surat_sumber') }}">
                                </div>
                                <div class="w-full md:w-1/4 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="tgl_surat_sumber">
                                        Tanggal
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="tgl_surat_sumber" type="date" placeholder="" name="tgl_surat_sumber"
                                        value="{{ old('tgl_surat_sumber') }}">
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-3/4 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="hal_surat_sumber">
                                        Perihal
                                    </label>
                                    <textarea
                                        class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-36 @error('hal_surat_sumber') is-invalid @enderror"
                                        rows="3" id="hal_surat_sumber" placeholder="" name="hal_surat_sumber">{{ old('hal_surat_sumber') }}</textarea>
                                </div>

                                <div class="w-full md:w-1/4 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="file">
                                        Upload File
                                    </label>

                                    <div
                                        class="editor mx-auto flex flex-col text-gray-800 border border-gray-300 rounded shadow-lg max-w-2xl">
                                        <div class="overflow-auto" x-data="{ images: [] }">
                                            <!-- icons -->
                                            <div class="icons flex text-gray-500 mx-3 mt-3 justify-center">
                                                <label id="select-image">
                                                    <svg class="min-w-32 bg-gray-100 cursor-pointer hover:text-gray-700 border rounded p-1 h-7"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                                    </svg>
                                                    <input hidden type="file" id="file" name="file"
                                                        @change="images = Array.from($event.target.files).map(file => ({url: URL.createObjectURL(file), name: file.name, preview: ['jpg', 'jpeg', 'png', 'gif', 'pdf'].includes(file.name.split('.').pop().toLowerCase()), size: file.size > 1024 ? file.size > 1048576 ? Math.round(file.size / 1048576) + 'mb' : Math.round(file.size / 1024) + 'kb' : file.size + 'b'}))"
                                                        x-ref="fileInput">
                                                </label>
                                            </div>

                                            <!-- Preview image here -->
                                            <div id="preview" class="mx-2 mt-1 mb-4 px-2 flex justify-center">
                                                <template x-for="(image, index) in images" :key="index">
                                                    <div class="relative w-32 h-32 object-cover rounded">
                                                        <div class="max-w-28 text-wrap text-center">
                                                            <span x-text="image.name"
                                                                class="text-xs text-center p-2 lowercase"></span>
                                                        </div>
                                                        <div x-show="image.preview"
                                                            class="relative w-32 h-32 object-cover rounded">
                                                            <img :src="image.url"
                                                                class="w-32 h-32 object-cover rounded">
                                                            <button @click="images.splice(index, 1)"
                                                                class="w-6 h-6 absolute text-center flex items-center top-0 right-0 m-2 text-white text-lg bg-red-500 hover:text-red-700 hover:bg-gray-100 rounded-full p-1"><span
                                                                    class="mx-auto">×</span></button>
                                                            <div class="max-w-28 text-wrap text-center">
                                                                <span x-text="image.size"
                                                                    class="text-xs text-center p-2"></span>
                                                            </div>
                                                            <div x-show="!image.preview"
                                                                class="relative w-32 h-32 object-cover rounded">

                                                                <svg class="fill-current  w-32 h-32 ml-auto pt-1"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24">
                                                                    <path
                                                                        d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z" />
                                                                </svg>
                                                                <button @click="images.splice(index, 1)"
                                                                    class="w-6 h-6 absolute text-center flex items-center top-0 right-0 m-2 text-white text-lg bg-red-500 hover:text-red-700 hover:bg-gray-100 rounded-full p-1"><span
                                                                        class="mx-auto">×</span></button>
                                                                <div x-text="image.size"
                                                                    class="text-xs text-center p-2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                    @error('file')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        {{-- Surat Perintah Tugas --}}

                        <div class="part mb-3 pb-5 border-bottom">
                            <div class="title-part text-lg mb-3">
                                Identitas Surat Perintah Tugas (SPT)
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-2">
                                <div class="w-full md:w-2/5 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="category">
                                        Kategori / Kode Surat
                                    </label>
                                    <div class="relative">
                                        <select
                                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            name="category_id">
                                            @foreach ($categories as $category)
                                                @if (old('category_id') == $category->id)
                                                    <option value="{{ $category->id }}" selected>{{ $category->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $category->id }}">{{ $category->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="no_spt">
                                        Nomor Surat
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="no_spt" type="text" placeholder="" name="no_spt"
                                        value="{{ old('no_spt') }}" required>
                                    @error('no_spt')
                                        <div class="text-red-500">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="w-full md:w-2/5 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="tgl_spt">
                                        Tanggal Surat
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="tgl_spt" type="date" name="tgl_spt">
                                </div>
                            </div>

                        </div>
                        {{-- Data SPPD --}}
                        <div class="part mb-3 pb-5 border-bottom">
                            <div class="title-part text-lg mb-3">
                                Data Perjalanan Dinas (SPPD)
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-2">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="name_id">
                                        Nama yang diperintah
                                    </label>
                                    <div class="relative">
                                        <select
                                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('name_id') is-invalid @enderror"
                                            id="name_id" placeholder="" name="name_id"
                                            value="{{ old('name_id') }}" required>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('name_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="follower_id">
                                        Pengikut
                                    </label>
                                    <div class="relative">
                                        <select
                                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            id="follower_id" placeholder="" name="follower_id"
                                            value="{{ old('follower_id') }}" required>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-2">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="tempat_tujuan">
                                        Tempat Tujuan
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="tempat_tujuan" type="text" placeholder="" name="tempat_tujuan"
                                        value="{{ old('tempat_tujuan') }}">
                                    @error('tempat_tujuan')
                                        <div class="text-red-500">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="tempat_berjalan">
                                        Tempat Berjalan
                                    </label>
                                    <div class="relative">
                                        <select
                                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            id="tempat_berjalan" placeholder="" name="tempat_berjalan"
                                            value="{{ old('tempat_berjalan') }}">
                                            @foreach ($ways as $way)
                                                <option value="{{ $way }}">{{ $way }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-3 mb-2">
                                <div class="w-full md:w-2/6 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="tgl_berangkat">
                                        Tanggal Berangkat
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="tgl_berangkat" type="date" placeholder="" name="tgl_berangkat"
                                        value="{{ old('tgl_berangkat') }}">
                                </div>
                                <div class="w-full md:w-2/6 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="tgl_kembali">
                                        Tanggal Kembali
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="tgl_kembali" type="date" placeholder="" name="tgl_kembali"
                                        value="{{ old('tgl_kembali') }}">
                                </div>
                                <div class="w-full md:w-1/6 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="lama">
                                        Lama Perjalanan
                                    </label>
                                    <input
                                        class="text-center appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="lama" type="number" min="1" placeholder="" name="lama"
                                        value="{{ old('lama') }}">
                                </div>
                                <div class="w-full md:w-1/6 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="jam_berangkat">
                                        Jam Berangkat
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-center"
                                        id="jam_berangkat" type="time" placeholder="" name="jam_berangkat"
                                        value="{{ old('jam_berangkat') }}">
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-2">
                                <div class="w-full px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="maksud">
                                        Maksud Perjalanan Dinas
                                    </label>
                                    <textarea
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-20"
                                        id="maksud" type="text" placeholder="" name="maksud" value="{{ old('maksud') }}"></textarea>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-2">
                                <div class="w-full px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="keterangan">
                                        Keterangan
                                    </label>
                                    <textarea
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-32"
                                        id="keterangan" type="text" placeholder="" name="keterangan" value="{{ old('keterangan') }}"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-2 text-center">
                            <div class="w-11/12 px-3 mb-6 md:mb-0" hidden>
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="slug">

                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-300 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-center"
                                    id="slug" type="text" name="slug" style="cursor:not-allowed;"
                                    disabled readonly>
                            </div>
                            <div class="w-1/12 px-3 mb-6 md:mb-0" hidden>
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="author_id">

                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-300 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-center"
                                    id="author_id" type="text" name="author_id" style="cursor:not-allowed;"
                                    value="{{ auth()->user()->id }}" disabled readonly>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6 mb-6">
                            <button type="button"
                                class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                            <button type="submit"
                                class="rounded-md bg-blue-600 hover:bg-blue-700 px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-900">Save</button>
                        </div>
                    </form>
</x-dashboard.layout>
