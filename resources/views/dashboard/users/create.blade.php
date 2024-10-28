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
                        @csrf
                        <div class="part mb-3 pb-3 border-bottom">
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-4/6 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="username">
                                        Username
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('username') border-1 border-red-500 @else border-0 @enderror"
                                        id="username" value="{{ old('username') }}" name="username" type="text">
                                </div>
                                <div class="w-full md:w-2/6 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="role">
                                        Role
                                    </label>
                                    <select
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('role') border-1 border-red-500 @else border-0 @enderror"
                                        id="role" type="text" placeholder="" name="role"
                                        value="{{ old('role') }}">
                                        @foreach ($roles as $role)
                                            @if (old('role') == $role)
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
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="name">
                                        Nama Lengkap
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('name') border-1 border-red-500 @else border-0 @enderror"
                                        id="name" type="text" placeholder="" name="name"
                                        value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="email">
                                        Email
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('email') border-1 border-red-500 @else border-0 @enderror"
                                        id="email" type="text" placeholder="" name="email"
                                        value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="password">
                                        Password
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('password') border-1 border-red-500 @else border-0 @enderror"
                                        id="password" type="password" name="password">
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="password_confirmation">
                                        Konfirmasi Password
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('password_confirmation') border-1 border-red-500 @else border-0 @enderror"
                                        id="password_confirmation" type="password" placeholder=""
                                        name="password_confirmation">
                                </div>
                                @error('password_confirmation')
                                    <div class="w-full px-3">
                                        <p class="text-red-500">Konfirmasi Password tidak sama</p>
                                    </div>
                                @enderror
                            </div>

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
