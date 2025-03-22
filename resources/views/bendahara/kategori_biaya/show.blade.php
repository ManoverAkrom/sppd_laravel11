<x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot>
    <x-dashboard.header>
        <div class="text-center">
            {{ $title }}
        </div>
    </x-dashboard.header>

    <div class="px-4 py-6 mx-auto w-full max-w-2xl bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-center mb-4">{{ $category->name }}</h1>
        <div class="mb-2">
            <strong>Code:</strong> <span class="text-gray-700">{{ $category->code }}</span>
        </div>
        <div class="mb-2">
            <strong>Color:</strong>
            <span class="inline-block w-4 h-4 rounded-full bg-{{ $category->color }}-500"></span>
            {{-- <span class="text-gray-700">{{ $category->color }}</span> --}}
        </div>
    </div>
</x-dashboard.layout>
