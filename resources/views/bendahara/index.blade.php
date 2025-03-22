<x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot>

    <h1>Components</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($components as $component)
                <tr>
                    <td>{{ $component->name }}</td>
                    <td>{{ $component->slug }}</td>
                    <td>{{ $component->amount }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-dashboard.layout>
