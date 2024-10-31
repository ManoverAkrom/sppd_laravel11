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
                    <form method="post" action="/dashboard/users/{{ $user->username }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="part flex mb-2 pb-3 border-bottom ">
                            <div class="slicer md:w-9/12 me-3 border-r-2 pe-5">
                                <div class="flex flex-wrap -mx-3 mb-5">
                                    <div class="w-full md:w-1/2 px-3 mb-5 md:mb-0">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="username">
                                            Username
                                        </label>
                                        <input
                                            class="appearance-none block w-full bg-gray-200 text-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('username') border-1 border-red-500 @else border-0 @enderror"
                                            id="username" value="{{ old('username', $user->username) }}"
                                            name="username" type="text" readonly>
                                    </div>
                                    <div class="w-full md:w-1/2 px-3 mb-5 md:mb-0">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="role">
                                            Role
                                        </label>
                                        <select
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('role') border-1 border-red-500 @else border-0 @enderror"
                                            id="role" type="text" placeholder="" name="role"
                                            value="{{ old('role') }}">
                                            @foreach ($roles as $role)
                                                @if (old('role', $user->role) == $role)
                                                    <option value="{{ $role }}" selected>{{ $role }}
                                                    </option>
                                                @else
                                                    <option value="{{ $role }}">{{ $role }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full px-3 mb-6 md:mb-0">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="email">
                                            Email
                                        </label>
                                        <input
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('email') border-1 border-red-500 @else border-0 @enderror"
                                            id="email" type="email" placeholder="" name="email"
                                            value="{{ old('email', $user->email) }}">
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full px-3">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="name">
                                            Nama Lengkap
                                        </label>
                                        <input
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('name') border-1 border-red-500 @else border-0 @enderror"
                                            id="name" type="text" placeholder="" name="name"
                                            value="{{ old('name', $user->name) }}">
                                    </div>

                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="nip">
                                            NIP
                                        </label>
                                        <input
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('nip') border-1 border-red-500 @else border-0 @enderror"
                                            id="nip" type="text" placeholder="" name="nip"
                                            value="{{ old('nip', $user->nip) }}">
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="pangkat">
                                            Pangkat/Golongan
                                        </label>
                                        <select
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('pangkat') border-1 border-red-500 @else border-0 @enderror"
                                            id="pangkat" type="text" placeholder="" name="pangkat"
                                            value="{{ old('pangkat', $user->pangkat) }}">
                                            @foreach ($ranks as $rank)
                                                @if (old('pangkat', $user->pangkat) == $rank)
                                                    <option value="{{ $rank }}" selected>{{ $rank }}
                                                    </option>
                                                @else
                                                    <option value="{{ $rank }}">{{ $rank }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full px-3">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="jabatan">
                                            Jabatan
                                        </label>
                                        <input
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('jabatan') border-1 border-red-500 @else border-0 @enderror"
                                            id="jabatan" type="text" placeholder="Isi sesuai SK Pengangkatan"
                                            name="jabatan" value="{{ old('jabatan', $user->jabatan) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="slicer md:w-3/12 ps-2">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="foto">
                                    Upload Foto
                                </label>
                                <input type="hidden" name="oldFoto" value="{{ $user->foto }}">
                                <input
                                    class="block w-full text-sm text-gray-900 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 @error('foto') border-1 border-red-500 @else border border-gray-300 @enderror"
                                    id="foto" type="file" placeholder="" name="foto"
                                    value="{{ old('foto', $user->foto) }}" onchange="previewImage()">
                                @if ($user->foto)
                                    <img src="{{ asset('storage/' . $user->foto) }}" class="img-preview mt-2">
                                @else
                                    <div class="text-center mt-2">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">
                                            SVG, PNG, JPG or JPEG (Max. 500 kb)</p>
                                        <div class="flex justify-center">
                                            <img class="img-preview mt-2" width="200">
                                        </div>
                                        <p class="text-center mt-1 text-sm" id="f-details"></p>
                                    </div>
                                @endif
                                @error('foto')
                                    <div class="invalid-feedback">
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                class="font-medium">Oops!</span> Upload Maksimal 500kb</p>
                                    </div>
                                @enderror

                            </div>

                        </div>
                        <div class="mt-6 flex items-center justify-end gap-x-6 ">
                            <a href="/dashboard/users/">
                                <button type="button"
                                    class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                            </a>
                            <button type="submit"
                                class="rounded-md bg-blue-600 hover:bg-blue-700 px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-900">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-dashboard.layout>
