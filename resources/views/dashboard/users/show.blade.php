<x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot>
    <x-dashboard.header>
        <a href="/dashboard/users">
            <div class="text-center">
                {{ $title }}
            </div>
        </a>
    </x-dashboard.header>

    <div class="flex">
        <div class="w-4/6">
            <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg me-2 p-3 pb-10 px-4">
                <div class="items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 overflow-x-auto">
                    <div class="mb-6">
                        @if ($user->foto == null)
                            <div class="flex text-center justify-center">

                                <svg class="w-[175px] h-[175px] text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                                        clip-rule="evenodd" />
                                </svg>

                            </div>
                        @else
                            <div class="flex justify-center text-center mb-3 ">
                                <img src="{{ asset('storage/' . $user->foto) }}" alt="{{ $user->name }}"
                                    width="175" height="175"
                                    class="rounded-2xl border-dotted border-2 border-blue-500 hover:border-none p-1">
                            </div>
                        @endif

                        <div class="text-center font-bold text-lg">{{ $user->name }}</div>

                    </div>
                    <!-- Table -->
                    <table class="min-w-full text-left text-sm whitespace-nowrap">

                        <tbody>

                            <tr class="dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                                <th scope="row" class="w-10 px-2 py-4 text-left">
                                    Username
                                </th>
                                <td scope="row" class="w-10 ps-2 pe-1 py-3 text-left text-wrap border-1">
                                    : </td>
                                <td class="ps-2 pe-1 py-3 text-left text-wrap border-1">
                                    {{ $user->username }}
                                </td>
                            </tr>
                            <tr class="dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                                <th scope="row" class="w-10 px-2 py-4 text-left">
                                    Email
                                </th>
                                <td scope="row" class="w-10 ps-2 pe-1 py-3 text-left text-wrap border-1">
                                    : </td>
                                <td class="ps-2 pe-1 py-3 text-left text-wrap border-1">
                                    {{ $user->email }}
                                </td>
                            </tr>
                            <tr class="dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                                <th scope="row" class="w-10 px-2 py-4 text-left">
                                    NIP
                                </th>
                                <td scope="row" class="w-10 ps-2 pe-1 py-3 text-left text-wrap border-1">
                                    : </td>
                                <td class="ps-2 pe-1 py-3 text-left text-wrap border-1 ">
                                    {{ $user->nip }}
                                </td>
                            </tr>
                            <tr class="dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                                <th scope="row" class="w-10 px-2 py-4 text-left">
                                    Pangkat/Golongan
                                </th>
                                <td scope="row" class="w-10 ps-2 pe-1 py-3 text-left text-wrap border-1">
                                    : </td>
                                @if ($user->pangkat == '-')
                                    <td class="ps-2 pe-1 py-3 text-left text-wrap border-1 ">
                                        {{ $user->pangkat }}
                                    </td>
                                @else
                                    <td class="ps-2 pe-1 py-3 text-left text-wrap border-1 ">
                                        {{ $user->pangkat }} ({{ $user->gol }})
                                    </td>
                                @endif
                            </tr>
                            <tr class="dark:border-neutral-400 hover:bg-neutral-300 dark:hover:bg-neutral-600">
                                <th scope="row" class="w-10 px-2 py-4 text-left">
                                    Jabatan
                                </th>
                                <td scope="row" class="w-10 ps-2 pe-1 py-3 text-left text-wrap border-1">
                                    : </td>
                                <td class="ps-2 pe-1 py-3 text-left text-wrap border-1 ">
                                    {{ $user->jabatan }}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="w-2/6">
            <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg p-8">
                <h1 class="text-lg text-center font-extrabold">Kelola Klasifikasi Surat</h1>
                <div class="text-center my-5 border-t-2 pt-10">
                    <a type="button" href="/dashboard/users/{{ $user->username }}/edit"
                        class="block w-full rounded border-4 border-zinc-500 text-zinc-500 hover:border-zinc-600 hover:bg-zinc-400 hover:bg-opacity-10 hover:text-zinc-600 focus:border-zinc-700 focus:text-zinc-700 active:border-zinc-800 active:text-zinc-800 dark:border-zinc-300 dark:text-zinc-300 dark:hover:hover:bg-zinc-300 px-6 pb-2 pt-2.5 text-xl font-medium uppercase leading-normal transition duration-150 ease-in-out focus:outline-none focus:ring-0">
                        <svg class="inline me-1 w-[24px] h-[24px]" viewBox="0 0 512 512" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"
                                clip-rule="evenodd">
                            </path>
                        </svg>
                        Edit
                    </a>
                </div>
                <div class="text-center my-5">
                    <form action="/dashboard/users/{{ $user->username }}" method="post" class="inline">
                        @method('delete')
                        @csrf
                        <button
                            class="block w-full rounded border-4 border-red-500 text-red-500 hover:border-red-600 hover:bg-red-400 hover:bg-opacity-10 hover:text-red-600 focus:border-red-700 focus:text-red-700 active:border-red-800 active:text-red-800 dark:border-red-300 dark:text-red-300 dark:hover:hover:bg-red-300 px-6 pb-2 pt-2.5 text-xl font-medium uppercase leading-normal transition duration-150 ease-in-out focus:outline-none focus:ring-0"
                            onclick="return confirm('Yakin mau dihapus?')">
                            <span class="bi bi-trash3">
                                <svg class="inline me-1 w-[24px] h-[24px]" viewBox="0 0 448 512" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"
                                        clip-rule="evenodd">
                                    </path>
                                </svg>
                                Delete
                            </span>
                        </button>
                        </a>
                    </form>
                </div>
                <div class="text-left mt-10 border-t-2 pt-8">
                    Akun dibuat pada
                    {{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('l, d M Y') }} pukul
                    {{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('H:i') }} WIB
                    <p>({{ $user->created_at->diffForHumans() }})</p>
                </div>
                @if ($user->updated_at != $user->created_at)
                    <div class="text-left mt-10">
                        Terakhir diubah
                        {{ \Carbon\Carbon::parse($user->updated_at)->translatedFormat('l, d M Y') }} pukul
                        {{ \Carbon\Carbon::parse($user->updated_at)->translatedFormat('H:i') }} WIB
                        <p>({{ $user->updated_at->diffForHumans() }})</p>
                    </div>
                @endif

            </div>
        </div>
    </div>


</x-dashboard.layout>
