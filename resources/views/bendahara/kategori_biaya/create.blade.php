<x-dashboard.layout>
    <x-slot:title>Add Category</x-slot>
    <x-dashboard.header>
        <div class="text-center">
            Add New Category
        </div>
    </x-dashboard.header>

    <div class="px-2 mx-auto w-full">
        <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <form action="/dashboard/kategori_biaya" method="POST" class="p-4">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                    <input type="text" id="name" name="name" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                </div>
                <div class="mb-4">
                    <label for="code" class="block text-sm font-medium text-gray-700">Kode</label>
                    <input type="text" id="code" name="code" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                </div>
                <div class="mb-4">
                    <label for="color" class="block text-sm font-medium text-gray-700">Warna</label>
                    <input type="text" id="color" name="color" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="w-full inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-primary-700 border border-transparent rounded-md shadow-sm hover:bg-primary-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        Save Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-dashboard.layout>
