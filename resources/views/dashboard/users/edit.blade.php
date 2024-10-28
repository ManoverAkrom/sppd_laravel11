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
                    <form method="post" action="/dashboard/users" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="part mb-3 pb-3 border-bottom">
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-2/5 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="username">
                                        Username
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('username') border-1 border-red-500 @else border-0 @enderror"
                                        id="username" value="{{ old('username', $user->username) }}" name="username"
                                        type="text">
                                </div>

                                <div class="w-full md:w-2/5 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="email">
                                        Email
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('email') border-1 border-red-500 @else border-0 @enderror"
                                        id="email" type="email" placeholder="" name="email"
                                        value="{{ old('email', $user->email) }}">
                                </div>

                                <div class="w-full md:w-1/5 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
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
                                <div class="w-full md:w-1/2 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="name">
                                        Nama Lengkap
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('name') border-1 border-red-500 @else border-0 @enderror"
                                        id="name" type="text" placeholder="" name="name"
                                        value="{{ old('name', $user->name) }}">
                                </div>
                                <div class="w-full md:w-1/2 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="nip">
                                        NIP
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('nip') border-1 border-red-500 @else border-0 @enderror"
                                        id="nip" type="text" placeholder="" name="nip"
                                        value="{{ old('nip', $user->nip) }}">
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-2/5 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="pangkat">
                                        Pangkat
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('pangkat') border-1 border-red-500 @else border-0 @enderror"
                                        id="pangkat" type="text" placeholder="" name="pangkat"
                                        value="{{ old('pangkat', $user->pangkat) }}">
                                </div>
                                <div class="w-full md:w-1/5 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="gol">
                                        Golongan
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('gol') border-1 border-red-500 @else border-0 @enderror"
                                        id="gol" type="text" placeholder="" name="gol"
                                        value="{{ old('gol', $user->gol) }}">
                                </div>
                                <div class="w-full md:w-2/5 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="jabatan">
                                        Jabatan
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('jabatan') border-1 border-red-500 @else border-0 @enderror"
                                        id="jabatan" type="text" placeholder="" name="jabatan"
                                        value="{{ old('jabatan', $user->jabatan) }}">
                                </div>
                            </div>

                            <div class="w-full md:w-1/4">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="foto">
                                    Upload Foto
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('foto') border-1 border-red-500 @else border-0 @enderror"
                                    id="foto" type="file" placeholder="" name="foto"
                                    value="{{ old('foto', $user->foto) }}">
                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mt-6 flex items-center justify-end gap-x-6 mb-6">
                                <a href="/dashboard/users/">
                                    <button type="button"
                                        class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                                </a>
                                <button type="submit"
                                    class="rounded-md bg-blue-600 hover:bg-blue-700 px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-900">Save</button>
                            </div>
                    </form>
</x-dashboard.layout>
