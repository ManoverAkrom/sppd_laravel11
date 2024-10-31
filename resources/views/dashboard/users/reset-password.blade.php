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
                    <form method="post" action="/dashboard/reset/{{ $user->username }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="part flex mb-2 pb-3 border-bottom ">
                            <div class="w-full me-3">
                                <div class="flex flex-wrap -mx-3 mb-5">
                                    <div class="w-full px-3 mb-5 md:mb-0">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="old_password">
                                            Password Lama
                                        </label>
                                        <input
                                            class="appearance-none block w-full bg-gray-200 text-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('old_password') border-1 border-red-500 @else border-0 @enderror"
                                            id="old_password" name="old_password" type="password">
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-5">
                                    <div class="w-full px-3 mb-5 md:mb-0">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="new_password">
                                            Password Baru
                                        </label>
                                        <input
                                            class="appearance-none block w-full bg-gray-200 text-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('new_password') border-1 border-red-500 @else border-0 @enderror"
                                            id="new_password" name="new_password" type="password">
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-5">
                                    <div class="w-full px-3 mb-5 md:mb-0">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="password_confirmation">
                                            Konfirmasi Password Baru
                                        </label>
                                        <input
                                            class="appearance-none block w-full bg-gray-200 text-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('password_confirmation') border-1 border-red-500 @else border-0 @enderror"
                                            id="password_confirmation" name="password_confirmation" type="password">
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="mt-6 flex items-center justify-end gap-x-6 ">
                            <a href="/dashboard/users/">
                                <button type="button"
                                    class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                            </a>
                            <button type="submit"
                                class="rounded-md bg-blue-600 hover:bg-blue-700 px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-900">Reset
                                Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-dashboard.layout>
