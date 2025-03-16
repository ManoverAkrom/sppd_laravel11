<x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot>
    <x-dashboard.header>
        <div class="text-center">
            {{ $title }}
        </div>
    </x-dashboard.header>

    <div class="container mx-auto p-2">

        <div class="bg-white shadow rounded py-3 px-6">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                        <th class="w-72 py-3 px-6 text-left">Komponen</th>
                        <th class="w-12 py-3 px-6 text-left">Kategori</th>
                        <th class="w-12 py-3 px-6 text-left">Dibuat pada</th>
                        <th class="w-20 py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm">
                    @foreach ($components as $component)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">
                                {{ $component->name }}
                            </td>
                            <td class="py-3 px-6 text-left">
                                {{ $component->travel_category->name }}
                            </td>
                            <td class="py-3 px-6 text-left">
                                {{ $component->created_at->format('d M Y') }}
                            </td>
                            <td class="py-3 px-6 text-center">
                                <a href="" class="text-blue-500 hover:underline">Edit</a>
                                <form action="/budgets/components/{{ $component->id }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline"
                                        onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</x-dashboard.layout>
