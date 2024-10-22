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
                    <form method="post" action="/dashboard/categories" enctype="multipart/form-data">
                        @csrf
                        <div class="part mb-3 pb-3 border-bottom">
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/6 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="code">
                                        Kode surat
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('code') border-1 border-red-500 @else border-0 @enderror"
                                        id="code" value="{{ old('code') }}" name="code" type="text">
                                </div>
                                <div class="w-full md:w-4/6 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="name">
                                        Pokok Urusan
                                    </label>
                                    <select
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('name') is-invalid @enderror"
                                        id="name" type="text" placeholder="" name="name"
                                        value="{{ old('name') }}">
                                        @foreach ($names as $name)
                                            @if (old('name') == $name)
                                                <option value="{{ $name }}" selected>{{ $name }}
                                                </option>
                                            @else
                                                <option value="{{ $name }}">{{ $name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full md:w-1/6 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="color">
                                        Warna Penanda
                                    </label>
                                    <select
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('color') is-invalid @enderror"
                                        id="color" type="text" placeholder="" name="color"
                                        value="{{ old('color') }}">
                                        @foreach ($colors as $color)
                                            @if (old('color') == $color)
                                                <option value="{{ $color }}" selected>{{ $color }}
                                                </option>
                                            @else
                                                <option value="{{ $color }}">{{ $color }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>


                            </div>

                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="sub_name">
                                        Sub Urusan / Fungsi
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="sub_name" type="text" placeholder="" name="sub_name"
                                        value="{{ old('sub_name') }}">
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="activity">
                                        Aktivitas / Kegiatan
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="activity" type="text" placeholder="" name="activity"
                                        value="{{ old('activity') }}">
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="transaction">
                                        Transaksi
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="transaction" type="text" placeholder="" name="transaction"
                                        value="{{ old('transaction') }}">
                                </div>
                            </div>

                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6 mb-6">
                            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                            <button type="submit"
                                class="rounded-md bg-blue-600 hover:bg-blue-700 px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-900">Save</button>
                        </div>
                    </form>
</x-dashboard.layout>
