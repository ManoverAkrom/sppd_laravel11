<x-dashboard.layout>
    <x-slot:title>{{ $title }}</x-slot>
    <x-dashboard.header>
        <a href="/dashboard/posts">
            <div class="text-center">
                {{ $title }}
            </div>
        </a>
    </x-dashboard.header>

    <div class="flex">
        <div class="w-4/6">
            <div class="me-2 max-w-4xl">
                <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg pt-8 pb-28 px-14">
                    <div>
                        <img src="/img/kopsurat.png" alt="Kop Surat SMKN 1 Kalikajar">
                    </div>
                    <div class="text-center font-extrabold">
                        <h1 class="text-xl underline underline-offset-8">
                            Surat Perintah Tugas</h1>
                        <h2 class="mt-1">Nomor : {{ $post->no_spt }}</h2>
                    </div>

                    @if ($post->sumber == null || ($post->no_surat_sumber = null))
                        <div class="mt-8"></div>
                    @elseif ($post->sumber == 'Perintah Kepala Sekolah')
                        <table class="mt-5">
                            <tbody style="text-align: justify;vertical-align: text-top;">
                                <tr>
                                    <td style="width: 90px;">
                                        Dasar
                                    </td>
                                    <td style="width: 20px;">
                                        :
                                    </td>
                                    <td>
                                        Perintah Kepala {{ $post->instansi }} tanggal
                                        {{ \Carbon\Carbon::parse($post->tgl_surat_sumber)->translatedFormat('d F Y') }},
                                        perihal
                                        {{ $post->hal_surat_sumber }}

                                    </td>
                            </tbody>
                        </table>
                    @else
                        <div class="flex flex-col p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4 mt-2">
                            <table>
                                <tbody style="text-align: justify;vertical-align: text-top;">
                                    <tr>
                                        <td style="width: 90px;">
                                            Dasar
                                        </td>
                                        <td style="width: 20px;">
                                            :
                                        </td>
                                        <td>
                                            {{ $post->sumber }} dari {{ $post->instansi }} nomor :
                                            {{ $post->no_surat_sumber }} , tanggal :
                                            {{ \Carbon\Carbon::parse($post->tgl_surat_sumber)->translatedFormat('d F Y') }}
                                            , perihal
                                            {{ $post->hal_surat_sumber }}
                                            <button>&#91; Lihat File Dasar Surat &#93;</button>
                                        </td>
                                </tbody>
                            </table>
                        </div>
                    @endif
                    <div class="font-semibold text-center mt-2">
                        MEMERINTAHKAN
                    </div>

                    <div class="flex flex-col space-y-3 md:flex-row md:space-y-0 md:space-x-4 mt-2 px-4">
                        <table>
                            <tbody>
                                <tr>
                                    <td style="width: 90px">
                                        Kepada:
                                    </td>
                                    <td style="width: 20px">

                                    </td>
                                    <td style="width: 120px">
                                        Nama
                                    </td>
                                    <td style="width: 20px">
                                        :
                                    </td>
                                    <td style="width: 700px">
                                        {{ $post->name->name }}

                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        NIP
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        {{ $post->name->nip }}

                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        Pangkat/Gol
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    @if ($post->name->pangkat == '-')
                                        <td>-</td>
                                    @else
                                        <td>
                                            {{ $post->name->pangkat }} ( {{ $post->name->gol }} )
                                        </td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        Jabatan
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        {{ $post->name->jabatan }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="flex flex-col space-y-3 md:flex-row md:space-y-0 md:space-x-4 mt-2 px-4">
                        Untuk melaksanakan tugas pada:
                    </div>

                    {{-- Pelaksanaan --}}
                    <div class="flex flex-col space-y-3 md:flex-row md:space-y-0 md:space-x-4 mt-2 px-4">
                        <table>
                            <tbody style="vertical-align: text-top;">
                                <tr>
                                    <td style="width: 90px">
                                        <button class="text-transparent" disabled>
                                            .........
                                        </button>
                                    </td>
                                    <td style="width: 20px">

                                    </td>
                                    <td style="width: 120px">
                                        Hari/Tanggal
                                    </td>
                                    <td style="width: 20px">
                                        :
                                    </td>
                                    <td style="width: 700px">
                                        @if ($post->tgl_berangkat === $post->tgl_kembali)
                                            {{ \Carbon\Carbon::parse($post->tgl_berangkat)->translatedFormat('l\, d F Y') }}
                                        @else()
                                            {{ \Carbon\Carbon::parse($post->tgl_berangkat)->translatedFormat('l\, d F Y') }}
                                            s.d.
                                            {{ \Carbon\Carbon::parse($post->tgl_kembali)->translatedFormat('l\, d F Y') }}
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        Waktu
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($post->jam_berangkat)->format('h:i') }} WIB s.d.
                                        selesai

                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        Acara
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        {{ $post->maksud }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        Tempat
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        {{ $post->tempat_tujuan }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="flex flex-col p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4 mt-2"
                        style="text-align: justify">
                        Demikian untuk dilaksanakan sebaik-baiknya dengan penuh tanggung jawab, setelah melaksanakan
                        tugas harap menyampaikan laporan.
                    </div>

                    <div class="flex flex-col p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4 mt-2">
                        <table>
                            <tbody style="vertical-align: text-top;">
                                <tr>
                                    <td style="width: 700px">

                                    </td>
                                    <td style="width: 450px">

                                        Kalikajar, {{ $post->created_at->isoformat('D MMMM Y') }}
                                        <br>
                                        Kepala Sekolah
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <span class="font-semibold underline">
                                            Drs. Rohmat Istiyadi
                                        </span>
                                        <br>
                                        NIP. 19671029 199103 1 007

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>

        </div>
        <div class="w-2/6">
            <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg p-8">
                <h1 class="text-lg text-center font-extrabold">Kelola Surat Perintah Tugas</h1>
                <div class="text-center my-5 border-t-2 pt-10">
                    <a type="button" href="/dashboard/posts/{{ $post->slug }}/edit"
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
                    <button type="button" onclick="printPDF('{{ $post->slug }}')"
                        class="block w-full rounded border-4 border-indigo-500 text-indigo-500 hover:border-indigo-600 hover:bg-indigo-400 hover:bg-opacity-10 hover:text-indigo-600 focus:border-indigo-700 focus:text-indigo-700 active:border-indigo-800 active:text-indigo-800 dark:border-indigo-300 dark:text-indigo-300 dark:hover:hover:bg-indigo-300 px-6 pb-2 pt-2.5 text-xl font-medium uppercase leading-normal transition duration-150 ease-in-out focus:outline-none focus:ring-0">
                        <svg class="inline me-1 w-[24px] h-[24px]" viewBox="0 0 512 512" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"
                                clip-rule="evenodd">
                            </path>

                        </svg>
                        Print
                    </button>
                </div>
                <div class="text-center my-5">
                    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="inline">
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
                    Surat Tugas ini dibuat oleh <span class="font-bold">{{ $post->author->name }}</span>
                    <p>
                        Pada {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('l, d M Y') }} |
                        {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('H:i') }} WIB
                    </p>
                    <p>({{ $post->created_at->diffForHumans() }})</p>
                    <div>
                        <div class="flex mt-5 justify-center text-center">
                            <div class="w-1/2">
                                <h1>Kategori</h1>
                                <div class="flex justify-center items-center my-1 text-gray-500">
                                    <a href="/dashboard/posts?category={{ $post->category->slug }}"
                                        class="bg-{{ $post->category->color }}-100 text-gray-500 text-base font-medium items-center px-3 py-1 rounded-xl dark:bg-gray-200 dark:text-gray-500 min-w-28 text-center">
                                        {{ $post->category->name }}
                                    </a>
                                </div>
                            </div>
                            <div class="w-1/2">
                                <h1 class="text-center">Status</h1>
                                <div class="flex justify-center my-1" style="cursor:default;">
                                    <p
                                        class="w-28 text-white text-center uppercase px-2 py-1 rounded-xl bg-yellow-300 font-semibold">
                                        {{ $post->status }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>



</x-dashboard.layout>
