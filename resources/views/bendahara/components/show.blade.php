<x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot>
    <x-dashboard.header>
        <a href="/dashboard/budgets/">
            <div class="text-center">
                {{ $title }}
            </div>
        </a>
    </x-dashboard.header>

    <div class="flex">
        <div class="w-4/6">
            <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg me-2 p-2">
                <div
                    class="items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4 overflow-x-auto">
                    <table class="min-w-full text-left text-sm whitespace-nowrap">

                        <tbody>
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                                <th scope="row" class="w-10 px-2 py-4 text-left">
                                    Nama
                                </th>
                                <td scope="row" class="w-10 ps-2 pe-1 py-3 text-left text-wrap border-1">
                                    : </td>
                                <td class="ps-2 pe-1 py-3 text-left text-wrap border-1 uppercase">
                                    {{ $fcomponent->name }}
                                </td>
                            </tr>
                            <tr class="dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                                <th scope="row" class="w-10 px-2 py-4 text-left">
                                    Biaya Perjalanan
                                </th>
                                <td scope="row" class="w-10 ps-2 pe-1 py-3 text-left text-wrap border-1">
                                    : </td>
                                <td class="ps-2 pe-1 py-3 text-left text-wrap border-1 uppercase">
                                    {{ $fcomponent->amount }}
                                </td>
                            </tr>
                            <tr class="dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                                <th scope="row" class="w-10 px-2 py-4 text-left">
                                    Kategori
                                </th>
                                <td scope="row" class="w-10 ps-2 pe-1 py-3 text-left text-wrap border-1">
                                <td class="ps-2 pe-1 py-3 text-left text-wrap border-1 uppercase">
                                    {{-- {{ $component->finance_category->name }} --}}

                                </td>
                            </tr>

                        </tbody>
                    </table>

                </div>

            </div>
        </div>

    </div>



</x-dashboard.layout>
