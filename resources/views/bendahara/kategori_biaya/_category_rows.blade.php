@foreach ($categories as $category)
    <tr
        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
        <th scope="row" class="w-10 px-1 py-4 text-center border-r-2">{{ $loop->iteration }}</th>
        <td class="ps-2 pe-1 py-3 text-left text-wrap border-1 uppercase">{{ $category->name }}</td>
        <td class="w-10 ps-2 pe-1 py-3 text-left text-wrap border-1">{{ $category->code }}</td>
        <td class="w-10 ps-2 pe-1 py-3 text-center text-wrap border-1">
            <span
                class="bg-{{ $category->color }}-100 text-gray-500 text-xs font-medium items-center px-3 py-1 rounded-xl dark:bg-gray-200 dark:text-gray-500 text-center">{{ $category->color }}</span>
        </td>
        <td class="w-38 px-2 py-3 text-center text-wrap">
            <button type="button"
                onclick="document.getElementById('modal{{ $loop->iteration }}').classList.remove('hidden'); document.body.classList.add('blur-sm')"
                class="text-white bg-gradient-to-r from-indigo-500 via-indigo-600 to-indigo-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-indigo-300 dark:focus:ring-indigo-800 shadow-lg shadow-indigo-500/50 dark:shadow-lg dark:shadow-indigo-800/80 font-medium rounded-lg text-sm p-1 text-center m-1">Show</button>
            <a href="/dashboard/kategori_biaya/{{ $category->code }}/edit">
                <button type="button"
                    class="text-white bg-gradient-to-r from-gray-400 via-gray-500 to-gray-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-300 dark:focus:ring-gray-800 shadow-lg shadow-gray-500/50 dark:shadow-lg dark:shadow-gray-800/80 font-medium rounded-lg text-sm p-1 text-center m-1">Edit</button>
            </a>
            <form action="/dashboard/kategori_biaya/{{ $category->code }}" method="post" class="inline">
                @method('delete')
                @csrf
                <button
                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm p-1 text-center m-1"
                    onclick="return confirm('Yakin mau dihapus?')">Delete</button>
            </form>
        </td>
    </tr>
@endforeach
