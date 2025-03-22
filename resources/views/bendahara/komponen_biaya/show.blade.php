<x-dashboard.layout>
    <x-slot:title>{{ $komponenBiaya->nama_komponen }}</x-slot>
    <x-dashboard.header>
        <div class="text-center">
            {{ $komponenBiaya->nama_komponen }}
        </div>
    </x-dashboard.header>

    <div class="px-4 py-2">
        <h2 class="text-lg font-semibold">Detail Komponen</h2>
        <p><strong>Kode:</strong> {{ $komponenBiaya->kode }}</p>
        <p><strong>Biaya:</strong> {{ number_format($komponenBiaya->biaya, 2) }}</p>
        <p><strong>Kategori:</strong> {{ $komponenBiaya->kategori->nama_kategori }}</p>
    </div>

    <div class="px-4 py-2">
        <a href="{{ route('komponen_biaya.index') }}" class="btn btn-primary">Kembali</a>
    </div>
</x-dashboard.layout>
