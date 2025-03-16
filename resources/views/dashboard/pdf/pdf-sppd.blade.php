<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak PDF</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <link href="{{ asset('assets/css/admin-pannel.css') }}" rel="stylesheet" />
    {{-- Tailwind --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        @media print {
            @page {
                size: F4 portrait;
            }

            body * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            .print-area {
                /* width: 100vw;
                height: 100vh; */
                overflow: visible;
                /* page-break-before: always;
                page-break-after: always; */
                page-break-inside: avoid;
                transform-origin: top center;
            }

            .print-area:last-child {
                /* page-break-after: auto; */
            }

        }
    </style>
</head>

<body>
    {{-- SPT --}}
    <div class="print-area">
        <div class="w-full">
            <div class="relative px-7 pt-1">
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
                                    {{ \Carbon\Carbon::parse($post->tgl_surat_sumber)->translatedFormat('j F Y') }},
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
                                        {{ \Carbon\Carbon::parse($post->tgl_surat_sumber)->translatedFormat('j F Y') }}
                                        , perihal
                                        {{ $post->hal_surat_sumber }}
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
                                        {{ \Carbon\Carbon::parse($post->tgl_berangkat)->translatedFormat('l\, j F Y') }}
                                    @else()
                                        {{ \Carbon\Carbon::parse($post->tgl_berangkat)->translatedFormat('l\, j F Y') }}
                                        s.d.
                                        {{ \Carbon\Carbon::parse($post->tgl_kembali)->translatedFormat('l\, j F Y') }}
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

                                    Kalikajar,
                                    {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('j F Y') }}
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

    {{-- SPPD --}}
    <div class="print-area">
        <div class="w-full">
            <div class="relative px-7 pt-1">
                <div>
                    <img src="/img/kopsurat.png" alt="Kop Surat SMKN 1 Kalikajar">
                </div>
                <div class="text-center font-extrabold">
                    <h1 class="text-lg underline underline-offset-8 mt-2">
                        SURAT PERINTAH PERJALANAN DINAS</h1>
                    <h2 class="text-sm mt-1">Nomor : 000.1.2.3/{{ $post->no_spt }}</h2>
                </div>
                <div class="flex justify-center">
                    <table class="w-full border-collapse text-sm mt-2">
                        <thead>
                            <tr class="">
                                <th class="min-w-7"></th>
                                <th class="min-w-1"></th>
                                <th class="min-w-16"></th>
                                <th class="min-w-48"></th>
                                <th class=" min-w-36"></th>
                                <th class="min-w-14"></th>
                                <th class="min-w-14"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-transaparent border border-black">
                            {{-- <th class="min-w-7 border border-black text-center">1</th>
                            <th class="min-w-4 border border-black text-center">2</th>
                            <th class="max-w-7 border border-black text-center">3</th>
                            <th class="max-w-1 border border-black text-center">4</th>
                            <th class="min-w-40 border border-black text-center">5</th>
                            <th class="max-w-20 border border-black text-center">6</th>
                            <th class="min-w-20 border border-black text-center">7</th> --}}

                            <tr class="border border-black">
                                <td scope="col" class="py-1 text-center">
                                    1.
                                </td>
                                <td colspan="3" scope="col" class="text-left">
                                    Pejabat yang memberi perintah
                                </td>
                                <td colspan="2" scope="col" class="text-left">
                                    @if ($post->name->jabatan == 'Kepala Sekolah')
                                        : Pengguna Kuasa Anggaran
                                    @else
                                        : Kepala Sekolah
                                    @endif
                                </td>
                            </tr>

                            <tr class="border border-black">
                                <td scope="col" class="py-1 text-center">
                                    2.
                                </td>
                                <td colspan="3" scope="col" class="text-left">
                                    Nama Pegawai yang melaksanakan Perjalanan Dinas
                                </td>
                                <td colspan="2" scope="col" class="text-left">
                                    : {{ $post->name->name }}
                                </td>
                            </tr>

                            <tr class="">
                                <td rowspan="3" scope="col" class="text-center align-top">
                                    3.
                                </td>
                                <td scope="col" class="text-left">
                                    a.
                                </td>
                                <td colspan="2" scope="col" class="">
                                    NIP
                                </td>
                                <td colspan="2" scope="col" class="">
                                    : {{ $post->name->nip }}
                                </td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="text-left">
                                    b.
                                </td>
                                <td colspan="2" scope="col" class="">
                                    Pangkat/Golongan
                                </td>
                                <td colspan="2" scope="col" class="">
                                    : {{ $post->name->pangkat }}
                                </td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="text-left">
                                    c.
                                </td>
                                <td colspan="2" scope="col" class="">
                                    Jabatan
                                </td>
                                <td colspan="2" scope="col" class="">
                                    : {{ $post->name->jabatan }}
                                </td>
                            </tr>

                            <tr class="border-t border-black">
                                <td rowspan="2" scope="col" class="text-center align-top">
                                    4.
                                </td>
                                <td colspan="3" scope="col" class="text-left">
                                    Maksud Perjalanan Dinas :
                                </td>
                            </tr>
                            <tr class="">
                                <td colspan="6" scope="col" class="">
                                    {{ $post->maksud }}
                                </td>
                            </tr>

                            <tr class="border border-black">
                                <td scope="col" class="py-1 text-center">
                                    5.
                                </td>
                                <td colspan="3" scope="col" class="text-left">
                                    Alat Angkut yang dipergunakan
                                </td>
                                <td colspan="2" scope="col" class="text-left">
                                    : Kendaraan Umum
                                </td>
                            </tr>

                            <tr class="">
                                <td rowspan="3" scope="col" class="text-center align-top">
                                    6.
                                </td>
                                <td scope="col" class="text-left">
                                    a.
                                </td>
                                <td colspan="2" scope="col" class="">
                                    Tempat Berjalan
                                </td>
                                <td colspan="2" scope="col" class="">
                                    : {{ $post->tempat_berjalan }}
                                </td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="text-left">
                                    b.
                                </td>
                                <td colspan="2" scope="col" class="">
                                    Tempat Tujuan
                                </td>
                                <td colspan="2" scope="col" class="">
                                    :
                                </td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="text-left"></td>
                                <td colspan="6" scope="col" class="">
                                    {{ $post->tempat_tujuan }}
                                </td>
                            </tr>

                            <tr class="border-t border-black">
                                <td rowspan="3" scope="col" class="text-center align-top">
                                    7.
                                </td>
                                <td scope="col" class="text-left">
                                    a.
                                </td>
                                <td colspan="2" scope="col" class="">
                                    Lamanya Perjalanan Dinas
                                </td>
                                <td colspan="2" scope="col" class="">
                                    : {{ $post->lama }}
                                </td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="text-left">
                                    b.
                                </td>
                                <td colspan="2" scope="col" class="">
                                    Tanggal Berangkat
                                </td>
                                <td colspan="2" scope="col" class="">
                                    : {{ \Carbon\Carbon::parse($post->tgl_berangkat)->translatedFormat('j F Y') }}
                                </td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="text-left align-top">
                                    c.
                                </td>
                                <td colspan="2" scope="col" class="">
                                    Tanggal Harus Kembali/Tiba di Tempat Baru
                                </td>
                                <td colspan="2" scope="col" class="">
                                    : {{ \Carbon\Carbon::parse($post->tgl_kembali)->translatedFormat('j F Y') }}
                                </td>
                            </tr>

                            <tr class="border border-black">
                                <td rowspan="3" scope="col" class="text-center align-top">
                                    8.
                                </td>
                                <td rowspan="3" scope="col" class="text-center align-top"></td>
                                <td rowspan="3" scope="col" class="text-warp text-left align-top">
                                    Pengikut
                                </td>
                                <td scope="col" class="text-center border-l border-black">
                                    Nama/NIP
                                </td>
                                <td scope="col" class="text-center border-l border-black">
                                    Pangkat/Golongan
                                </td>
                                <td colspan="2" scope="col" class="text-center border-l border-black">
                                    Jabatan
                                </td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="text-left border-x border-black pl-2">
                                    {{ $post->follower->name }}
                                </td>
                                <td rowspan="2" scope="col" class="text-center border-x border-black">
                                    {{ $post->follower->pangkat }}
                                </td>
                                <td colspan="2" rowspan="2" scope="col"
                                    class="text-center border-x border-black">
                                    {{ $post->follower->jabatan }}
                                </td>
                            </tr>
                            <tr class="border-b border-black">
                                <td scope="col" class="text-left border-x border-black pl-2">
                                    NIP. {{ $post->follower->nip }}
                                </td>
                            </tr>

                            <tr class="">
                                <td rowspan="3" scope="col" class="text-center align-top">
                                    9.
                                </td>
                                <td colspan="6" scope="col" class="text-left">
                                    Pembebanan Anggaran :
                            </tr>
                            <tr class="">
                                <td scope="col" class="text-left">
                                    a.
                                </td>
                                <td colspan="2" scope="col" class="">
                                    Instansi
                                </td>
                                <td colspan="2" scope="col" class="">
                                    : SMK Negeri 1 Kalikajar
                                </td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="text-left">
                                    b.
                                </td>
                                <td colspan="2" scope="col" class="">
                                    Mata Anggaran*)
                                </td>
                                <td colspan="2" scope="col" class="">
                                    : BOS / BOP
                                </td>
                            </tr>

                            <tr class="border-t border-black">
                                <td rowspan="3" scope="col" class="py-1 text-center align-top">
                                    10.
                                </td>
                                <td colspan="6" scope="col" class="py-1 text-left align-top">
                                    Keterangan Lain-lain:
                                </td>
                            </tr>
                            <tr class="">
                                <td rowspan="3" scope="col" class="py-1 text-center align-top">
                                </td>
                                <td colspan="6" scope="col" class="py-1 text-left align-top">
                                    {{ $post->keterangan }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-center">
                    <table class="w-full border-collapse text-sm mt-2">
                        <thead>
                            <tr class="">
                                <th class="min-w-7 "></th>
                                <th class="min-w-1 "></th>
                                <th class="min-w-16 "></th>
                                <th class="min-w-72 "></th>
                                <th class="min-w-20"></th>
                                <th class="min-w-1 "></th>
                                <th class="min-w-28 "></th>
                            </tr>
                        </thead>
                        <tbody class="bg-transaparent">
                            <tr>
                                <td colspan="4" class="">
                                    *) Coret yang tidak perlu
                                </td>
                                <td>
                                    Dikeluarkan di
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    Kalikajar
                                </td>
                            </tr>

                            <tr>
                                <td colspan="4" class=""></td>
                                <td>
                                    Pada tanggal
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('j F Y') }}
                                </td>
                            </tr>

                            <tr>
                                <td colspan="4" class=""></td>
                                <td colspan="3" class="text-center">
                                    Ditetapkan di Kalikajar
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class=""></td>
                                <td colspan="3" class="text-center">
                                    Tanggal {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('j F Y') }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class=""></td>
                                <td colspan="3" class="text-center text-wrap">
                                    Pengguna Kuasa Anggaran / Kuasa Pengguna Anggaran
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class=""></td>
                                <td colspan="3" class="pt-14 text-center text-wrap font-bold underline">
                                    Drs. ROHMAT ISTIYADI
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class=""></td>
                                <td colspan="3" class="text-center text-wrap">
                                    NIP. 19671029 199103 1 007
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Laporan --}}
    <div class="print-area">
        <div class="w-full">
            <div class="relative px-7 pt-1">
                <div class="text-center font-extrabold">
                    <h1 class="text-lg underline underline-offset-8 mt-2">
                        LAPORAN HASIL PERJALANAN DINAS</h1>
                </div>
                <div class="flex justify-center mt-3">
                    <table class="w-full  text-sm mt-2">
                        <thead>
                            <tr class="">
                                <th class="max-w-4  py-1"></th>
                                <th class="min-w-4 "></th>
                                <th class="min-w-4 "></th>
                                <th class="min-w-4 "></th>
                                <th class="min-w-52 "></th>
                                <th class="min-w-4 "></th>
                                <th class="min-w-14 "></th>
                                <th class="min-w-14 "></th>
                            </tr>
                        </thead>
                        <tbody class="bg-transaparent">
                            <tr class="">
                                <th class="w-12  py-1"></th>
                                <th class="w-8 "></th>
                                <th class="w-6 "></th>
                                <th class="w-1 "></th>
                                <th class="w-1 "></th>
                                <th class="w-1 "></th>
                                <th class="min-w-16 "></th>
                                <th class="min-w-16 "></th>
                            </tr>

                            <tr class="">
                                <td colspan="3" scope="col" class="py-1 text-left">
                                    Kepada Yth.
                                </td>
                                <td scope="col" class="text-center">:</td>
                                <td colspan="4" scope="col" class="text-left">
                                    Kepala SMK Negeri 1 Kalikajar
                                </td>
                            </tr>

                            <tr class="">
                                <td colspan="3" scope="col" class="py-1 text-left">
                                    Perihal
                                </td>
                                <td scope="col" class="text-center">:</td>
                                <td colspan="5" scope="col" class="text-left">
                                    Kepala SMK Negeri 1 Kalikajar
                                </td>
                            </tr>

                            <tr class="">
                                <td scope="col" class="py-1 text-left"></td>
                                <td colspan="5" scope="col" class="pt-3 text-left">
                                    Yang bertanda tangan di bawah ini,
                                </td>
                            </tr>

                            <tr class="">
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="text-left">
                                    a.
                                </td>
                                <td colspan="2" scope="col" class="text-left">
                                    Nama
                                </td>
                                <td scope="col" class="text-center">:</td>
                                <td colspan="2" scope="col" class="text-left">
                                    {{ $post->name->name }}
                                </td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="text-left">
                                    b.
                                </td>
                                <td colspan="2" scope="col" class="text-left">
                                    NIP
                                </td>
                                <td scope="col" class="text-center">:</td>
                                <td colspan="2" scope="col" class="text-left">
                                    {{ $post->name->nip }}
                                </td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="text-left">
                                    c.
                                </td>
                                <td colspan="2" scope="col" class="text-left">
                                    Pangkat, Gol, Ruang
                                </td>
                                <td scope="col" class="text-center">:</td>
                                <td colspan="2" scope="col" class="text-left">
                                    {{ $post->name->pangkat }}
                                </td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="text-left">
                                    d.
                                </td>
                                <td colspan="2" scope="col" class="text-left">
                                    Jabatan
                                </td>
                                <td scope="col" class="text-center">:</td>
                                <td colspan="2" scope="col" class="text-left">
                                    {{ $post->name->jabatan }}
                                </td>
                            </tr>

                            <tr class="">
                                <td scope="col" class="py-1 text-left"></td>
                                <td colspan="5" scope="col" class="pt-3 text-left">
                                    Telah melakukan perjalanan dinas pada,
                                </td>
                            </tr>

                            <tr class="">
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="text-left">
                                    a.
                                </td>
                                <td colspan="2" scope="col" class="text-left">
                                    Tanggal
                                </td>
                                <td scope="col" class="text-center">:</td>
                                <td colspan="2" scope="col" class="text-left">
                                    {{ \Carbon\Carbon::parse($post->tgl_berangkat)->translatedFormat('j F Y') }}
                                </td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="text-left">
                                    b.
                                </td>
                                <td colspan="2" scope="col" class="text-left">
                                    Tempat
                                </td>
                                <td scope="col" class="text-center">:</td>
                                <td colspan="2" scope="col" class="text-left">
                                    {{ $post->tempat_tujuan }}
                                </td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="text-left">
                                    c.
                                </td>
                                <td colspan="2" scope="col" class="text-left">
                                    Keperluan
                                </td>
                                <td scope="col" class="text-center">:</td>
                                <td colspan="2" scope="col" class="text-left">
                                    {{ $post->maksud }}
                                </td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="text-left">
                                    d.
                                </td>
                                <td colspan="2" scope="col" class="text-left">
                                    Surat Perintah Tugas nomor
                                </td>
                                <td scope="col" class="text-center">:</td>
                                <td colspan="2" scope="col" class="text-left">
                                    {{ $post->no_spt }}
                                </td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="text-left">
                                    e.
                                </td>
                                <td colspan="5" scope="col" class="text-left">
                                    Hasil melaksanakan Perjalanan Dinas sebagai berikut:
                                </td>
                            </tr>
                            {{-- Baris Laporan Kosong --}}
                            <tr class="">
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="text-left"></td>
                                <td colspan="5" scope="col"
                                    class="border-b border-dotted border-black text-left pt-5"></td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="text-left"></td>
                                <td colspan="5" scope="col"
                                    class="border-b border-dotted border-black text-left pt-5"></td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="text-left"></td>
                                <td colspan="5" scope="col"
                                    class="border-b border-dotted border-black text-left pt-5"></td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="text-left"></td>
                                <td colspan="5" scope="col"
                                    class="border-b border-dotted border-black text-left pt-5"></td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="text-left"></td>
                                <td colspan="5" scope="col"
                                    class="border-b border-dotted border-black text-left pt-5"></td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="text-left"></td>
                                <td colspan="5" scope="col"
                                    class="border-b border-dotted border-black text-left pt-5"></td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="text-left"></td>
                                <td colspan="5" scope="col"
                                    class="border-b border-dotted border-black text-left pt-5"></td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="text-left"></td>
                                <td colspan="5" scope="col"
                                    class="border-b border-dotted border-black text-left pt-5"></td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="text-left"></td>
                                <td colspan="5" scope="col"
                                    class="border-b border-dotted border-black text-left pt-5"></td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="text-left"></td>
                                <td colspan="5" scope="col"
                                    class="border-b border-dotted border-black text-left pt-5"></td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="text-left"></td>
                                <td colspan="5" scope="col"
                                    class="border-b border-dotted border-black text-left pt-5"></td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="text-left"></td>
                                <td colspan="5" scope="col"
                                    class="border-b border-dotted border-black text-left pt-5"></td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="text-left"></td>
                                <td colspan="5" scope="col"
                                    class="border-b border-dotted border-black text-left pt-5"></td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="text-left"></td>
                                <td colspan="5" scope="col"
                                    class="border-b border-dotted border-black text-left pt-5"></td>
                            </tr>
                            <tr class="">
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="py-1 text-center"></td>
                                <td scope="col" class="text-left"></td>
                                <td colspan="5" scope="col"
                                    class="border-b border-dotted border-black text-left pt-5"></td>
                            </tr>


                            <tr class="">
                                <td scope="col" class="py-1 text-center"></td>
                                <td colspan="7" scope="col" class="text-justify text-wrap pt-5">
                                    Demikian laporan perjalanan dinas ini saya buat untuk dipergunakan sebagaimana
                                    mestinya
                                </td>
                            </tr>
                            <tr class="">
                                <td colspan="5" scope="col" class="text-wrap align-top pt-4 text-center">
                                    Mengetahui,
                                </td>
                                <td colspan="3" scope="col" class="text-wrap align-top pt-4 text-center">
                                    Kalikajar,
                                    {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('j F Y') }}
                                </td>
                            </tr>
                            <tr class="">
                                <td colspan="5" scope="col" class="text-wrap align-top text-center">
                                    Pengguna Anggaran / Kuasa Pengguna Anggaran
                                </td>
                                <td colspan="3" scope="col" class="text-wrap align-top text-center">
                                    Yang Membuat Laporan
                                </td>
                            </tr>
                            <tr class="">
                                <td colspan="5" scope="col"
                                    class="text-wrap align-top font-bold underline pt-16 text-center">
                                    Drs. Rohmat Istiyadi
                                </td>
                                <td colspan="3" scope="col"
                                    class="text-wrap align-top font-bold underline pt-16 text-center">
                                    {{ $post->name->name }}
                                </td>
                            </tr>
                            <tr class="">
                                <td colspan="5" scope="col" class="text-wrap align-top text-center">
                                    NIP. 19671029 199103 1 007
                                </td>
                                <td colspan="3" scope="col" class="text-wrap align-top text-center">
                                    {{ $post->name->nip }}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Pengesahan --}}
    <div class="print-area">
        <div class="w-full">
            <div class="relative">
                <div class="text-left">
                    <p class="text-sm">Lembar II SPPD</p>
                </div>
                <div class="flex justify-center">
                    <table class="w-full text-sm">
                        {{-- <thead>
                            <tr class="">
                                <th class="min-w-4 py-1 border border-black">A</th>
                                <th class="min-w-4 border border-black">B</th>
                                <th class="min-w-4 border border-black">C</th>
                                <th class="min-w-4 border border-black">D</th>
                                <th class="min-w-4 border border-black">E</th>
                                <th class="min-w-4 border border-black">F</th>
                                <th class="min-w-4 border border-black">G</th>
                                <th class="min-w-4 border border-black">H</th>
                            </tr>
                        </thead> --}}
                        <tbody class="">
                            {{-- <tr class="">
                                <th class="w-8 py-1"></th>
                                <th class="w-20 "></th>
                                <th class="w-1 "></th>
                                <th class="min-w-44 "></th>
                                <th class="w-4 "></th>
                                <th class="min-w-20 "></th>
                                <th class="w-1 "></th>
                                <th class="min-w-44 "></th>
                            </tr> --}}
                            <tr class="border-x border-t border-black align-top">
                                <td class="min-w-6 py-0 text-right"></td>
                                <td class="max-w-28"></td>
                                <td class="w-1 text-center"></td>
                                <td class="min-w-44 "></td>
                                <td class="w-4 border-l border-black text-right">I.</td>
                                <td class="max-w-28">Berangkat dari (Tempat Kedudukan)</td>
                                <td class="w-1 ">:</td>
                                <td class="min-w-44 ps-2 ">SMK Negeri 1 Kalikajar</td>
                            </tr>
                            <tr class="border-x border-black">
                                <td class="min-w-6 py-0 text-right"></td>
                                <td class="min-w-28 "></td>
                                <td class="w-1 text-center"></td>
                                <td class="min-w-44 "></td>
                                <td class="w-4 border-l border-black"></td>
                                <td class="min-w-28 ">Ke</td>
                                <td class="w-1 ">:</td>
                                <td class="min-w-44 "></td>
                            </tr>
                            <tr class="border-x border-black">
                                <td class="min-w-6 py-0 text-right"></td>
                                <td class="min-w-28 "></td>
                                <td class="w-1 text-center"></td>
                                <td class="min-w-44 "></td>
                                <td class="w-4 border-l border-black"></td>
                                <td class="min-w-28 ">Pada Tanggal</td>
                                <td class="w-1 ">:</td>
                                <td class="min-w-44 "></td>
                            </tr>
                            <tr class="border-x border-black">
                                <td colspan="4" class="py-0 text-center"></td>
                                <td colspan="4" class="pt-2 pb-10 text-center border-l border-black">Pengguna Kuasa
                                    Anggaran</td>
                            </tr>
                            <tr class="border-x border-black">
                                <td colspan="4" class="text-center"></td>
                                <td colspan="4" class="text-center underline font-bold border-l border-black">(Drs.
                                    ROHMAT
                                    ISTIYADI)</td>
                            </tr>
                            <tr class="border-x border-black">
                                <td colspan="4" class="text-center"></td>
                                <td colspan="4" class="text-center pb-1 border-l border-black">NIP. 19671029 199103
                                    1 007</td>
                            </tr>

                            <tr class="border-x border-t border-black align-top">
                                <td class="min-w-6 py-0 text-right">II.</td>
                                <td class="min-w-36">Tiba di</td>
                                <td class="w-1 text-center">:</td>
                                <td class="min-w-44 "></td>
                                <td class="w-4 border-l border-black text-right"></td>
                                <td class="min-w-36">Berangkat dari</td>
                                <td class="w-1 ">:</td>
                                <td class="min-w-44 "></td>
                            </tr>
                            <tr class="border-x border-black">
                                <td class="min-w-6 py-0 text-right"></td>
                                <td class="min-w-28 ">Pada Tanggal</td>
                                <td class="w-1 text-center">:</td>
                                <td class="min-w-44 "></td>
                                <td class="w-4 border-l border-black"></td>
                                <td class="min-w-28 ">Ke</td>
                                <td class="w-1 ">:</td>
                                <td class="min-w-44 "></td>
                            </tr>
                            <tr class="border-x border-black">
                                <td class="min-w-6 py-0 text-right"></td>
                                <td class="min-w-28 "></td>
                                <td class="w-1 text-center"></td>
                                <td class="min-w-44 "></td>
                                <td class="w-4 border-l border-black"></td>
                                <td class="min-w-28 ">Pada Tanggal</td>
                                <td class="w-1 ">:</td>
                                <td class="min-w-44 "></td>
                            </tr>
                            <tr class="border-x border-black align-top">
                                <td class="min-w-6 py-0 text-right pb-14"></td>
                                <td class="min-w-28 ">Kepala</td>
                                <td class="w-1 text-center">:</td>
                                <td class="min-w-44 "></td>
                                <td class="w-4 border-l border-black"></td>
                                <td class="min-w-28 ">Kepala</td>
                                <td class="w-1 ">:</td>
                                <td class="min-w-44 "></td>
                            </tr>
                            <tr class="border-x border-black">
                                <td colspan="4" class="py-0 text-center">
                                    (..........................................................................)
                                </td>
                                <td colspan="4" class="py-0 text-center border-l border-black">
                                    (..........................................................................)
                                </td>
                            </tr>
                            <tr class="border-x border-black">
                                <td colspan="4" class="py-0 text-center">
                                    NIP. ....................................................................
                                </td>
                                <td colspan="4" class="py-0 text-center border-l border-black">
                                    NIP. ....................................................................
                                </td>
                            </tr>

                            <tr class="border-x border-t border-black align-top">
                                <td class="min-w-6 py-0 text-right">III.</td>
                                <td class="min-w-36">Tiba di</td>
                                <td class="w-1 text-center">:</td>
                                <td class="min-w-44 "></td>
                                <td class="w-4 border-l border-black text-right"></td>
                                <td class="min-w-36">Berangkat dari</td>
                                <td class="w-1 ">:</td>
                                <td class="min-w-44 "></td>
                            </tr>
                            <tr class="border-x border-black">
                                <td class="min-w-6 py-0 text-right"></td>
                                <td class="min-w-28 ">Pada Tanggal</td>
                                <td class="w-1 text-center">:</td>
                                <td class="min-w-44 "></td>
                                <td class="w-4 border-l border-black"></td>
                                <td class="min-w-28 ">Ke</td>
                                <td class="w-1 ">:</td>
                                <td class="min-w-44 "></td>
                            </tr>
                            <tr class="border-x border-black">
                                <td class="min-w-6 py-0 text-right"></td>
                                <td class="min-w-28 "></td>
                                <td class="w-1 text-center"></td>
                                <td class="min-w-44 "></td>
                                <td class="w-4 border-l border-black"></td>
                                <td class="min-w-28 ">Pada Tanggal</td>
                                <td class="w-1 ">:</td>
                                <td class="min-w-44 "></td>
                            </tr>
                            <tr class="border-x border-black align-top">
                                <td class="min-w-6 py-0 text-right pb-14"></td>
                                <td class="min-w-28 ">Kepala</td>
                                <td class="w-1 text-center">:</td>
                                <td class="min-w-44 "></td>
                                <td class="w-4 border-l border-black"></td>
                                <td class="min-w-28 ">Kepala</td>
                                <td class="w-1 ">:</td>
                                <td class="min-w-44 "></td>
                            </tr>
                            <tr class="border-x border-black">
                                <td colspan="4" class="py-0 text-center">
                                    (..........................................................................)
                                </td>
                                <td colspan="4" class="py-0 text-center border-l border-black">
                                    (..........................................................................)
                                </td>
                            </tr>
                            <tr class="border-x border-black">
                                <td colspan="4" class="py-0 text-center">
                                    NIP. ....................................................................
                                </td>
                                <td colspan="4" class="py-0 text-center border-l border-black">
                                    NIP. ....................................................................
                                </td>
                            </tr>

                            <tr class="border-x border-t border-black align-top">
                                <td class="min-w-6 py-0 text-right">IV.</td>
                                <td class="min-w-36">Tiba di</td>
                                <td class="w-1 text-center">:</td>
                                <td class="min-w-44 "></td>
                                <td class="w-4 border-l border-black text-right"></td>
                                <td class="min-w-36">Berangkat dari</td>
                                <td class="w-1 ">:</td>
                                <td class="min-w-44 "></td>
                            </tr>
                            <tr class="border-x border-black">
                                <td class="min-w-6 py-0 text-right"></td>
                                <td class="min-w-28 ">Pada Tanggal</td>
                                <td class="w-1 text-center">:</td>
                                <td class="min-w-44 "></td>
                                <td class="w-4 border-l border-black"></td>
                                <td class="min-w-28 ">Ke</td>
                                <td class="w-1 ">:</td>
                                <td class="min-w-44 "></td>
                            </tr>
                            <tr class="border-x border-black">
                                <td class="min-w-6 py-0 text-right"></td>
                                <td class="min-w-28 "></td>
                                <td class="w-1 text-center"></td>
                                <td class="min-w-44 "></td>
                                <td class="w-4 border-l border-black"></td>
                                <td class="min-w-28 ">Pada Tanggal</td>
                                <td class="w-1 ">:</td>
                                <td class="min-w-44 "></td>
                            </tr>
                            <tr class="border-x border-black align-top">
                                <td class="min-w-6 py-0 text-right pb-14"></td>
                                <td class="min-w-28 ">Kepala</td>
                                <td class="w-1 text-center">:</td>
                                <td class="min-w-44 "></td>
                                <td class="w-4 border-l border-black"></td>
                                <td class="min-w-28 ">Kepala</td>
                                <td class="w-1 ">:</td>
                                <td class="min-w-44 "></td>
                            </tr>
                            <tr class="border-x border-black">
                                <td colspan="4" class="py-0 text-center">
                                    (..........................................................................)
                                </td>
                                <td colspan="4" class="py-0 text-center border-l border-black">
                                    (..........................................................................)
                                </td>
                            </tr>
                            <tr class="border-x border-black">
                                <td colspan="4" class="py-0 text-center">
                                    NIP. ....................................................................
                                </td>
                                <td colspan="4" class="py-0 text-center border-l border-black">
                                    NIP. ....................................................................
                                </td>
                            </tr>
                            </tr>

                            <tr class="border-x border-t border-black align-top">
                                <td class="min-w-6 py-0 text-right">V.</td>
                                <td class="min-w-36">Tiba di</td>
                                <td class="w-1 text-center">:</td>
                                <td class="min-w-44 "></td>
                                <td class="w-4 border-l border-black text-right"></td>
                                <td class="min-w-36">Berangkat dari</td>
                                <td class="w-1 ">:</td>
                                <td class="min-w-44 "></td>
                            </tr>
                            <tr class="border-x border-black">
                                <td class="min-w-6 py-0 text-right"></td>
                                <td class="min-w-28 ">Pada Tanggal</td>
                                <td class="w-1 text-center">:</td>
                                <td class="min-w-44 "></td>
                                <td class="w-4 border-l border-black"></td>
                                <td class="min-w-28 ">Ke</td>
                                <td class="w-1 ">:</td>
                                <td class="min-w-44 "></td>
                            </tr>
                            <tr class="border-x border-black">
                                <td class="min-w-6 py-0 text-right"></td>
                                <td class="min-w-28 "></td>
                                <td class="w-1 text-center"></td>
                                <td class="min-w-44 "></td>
                                <td class="w-4 border-l border-black"></td>
                                <td class="min-w-28 ">Pada Tanggal</td>
                                <td class="w-1 ">:</td>
                                <td class="min-w-44 "></td>
                            </tr>
                            <tr class="border-x border-black align-top">
                                <td class="min-w-6 py-0 text-right pb-14"></td>
                                <td class="min-w-28 ">Kepala</td>
                                <td class="w-1 text-center">:</td>
                                <td class="min-w-44 "></td>
                                <td class="w-4 border-l border-black"></td>
                                <td class="min-w-28 ">Kepala</td>
                                <td class="w-1 ">:</td>
                                <td class="min-w-44 "></td>
                            </tr>
                            <tr class="border-x border-black">
                                <td colspan="4" class="py-0 text-center">
                                    (..........................................................................)
                                </td>
                                <td colspan="4" class="py-0 text-center border-l border-black">
                                    (..........................................................................)
                                </td>
                            </tr>
                            <tr class="border-x border-black">
                                <td colspan="4" class="py-0 text-center">
                                    NIP. ....................................................................
                                </td>
                                <td colspan="4" class="py-0 text-center border-l border-black">
                                    NIP. ....................................................................
                                </td>
                            </tr>

                            <tr class="border-x border-t border-black align-top">
                                <td class="min-w-6 py-0 text-right">VI.</td>
                                <td class="min-w-36">Tiba kembali di</td>
                                <td class="w-1 text-center">:</td>
                                <td class="min-w-44 "></td>
                                <td rowspan="2" colspan="4"
                                    class="w-4 border-l border-black text-justify px-3 text-xs">Telah
                                    diperiksa
                                    dengan keterangan bahwa perjalanan tersebut atas perintah pejabat yang berwenang dan
                                    semata-mata untuk kepentingan jabatan dalam waktu yang sesingkat-singkatnya.
                                </td>
                            </tr>
                            <tr class="border-x border-black align-top">
                                <td class="min-w-6 py-0 text-right"></td>
                                <td class="min-w-28 ">Pada Tanggal</td>
                                <td class="w-1 text-center">:</td>
                                <td class="min-w-44 "></td>
                            </tr>
                            <tr class="border-x border-black align-top">
                                <td colspan="4" class="min-w-6 pt-5 pb-16 text-center text-xs">Pengguna Kuasa
                                    Anggaran/Kuasa Pengguna Anggaran</td>
                                <td colspan="4"
                                    class="min-w-6 pt-5 pb-16 text-center text-xs border-l border-black">Pengguna Kuasa
                                    Anggaran/Kuasa Pengguna Anggaran</td>
                            </tr>
                            <tr class="border-x border-black">
                                <td colspan="4" class="py-0 text-center underline font-bold">
                                    Drs. ROHMAT ISTIYADI
                                </td>
                                <td colspan="4" class="py-0 text-center underline font-bold border-l border-black">
                                    Drs. ROHMAT ISTIYADI
                                </td>
                            </tr>
                            <tr class="border-x border-black">
                                <td colspan="4" class="py-0 text-center">
                                    NIP. 19671029 199103 1 007
                                </td>
                                <td colspan="4" class="py-0 text-center border-l border-black">
                                    NIP. 19671029 199103 1 007
                                </td>
                            </tr>

                            <tr class="border-x border-t border-black align-top">
                                <td class="min-w-6 py-0 text-right">VII.</td>
                                <td colspan="7" class="pb-4 text-left">
                                    Catatan Lain-lain
                                </td>
                            </tr>
                            <tr class="border-x border-t border-black align-top">
                                <td class="min-w-6 py-0 text-right">VIII.</td>
                                <td colspan="7" class="text-left">
                                    PERHATIAN
                                </td>
                            </tr>
                            <tr class="border-b border-x border-black align-top">
                                <td class="min-w-6 py-0 text-right"></td>
                                <td colspan="7" class="pb-4 text-justify text-xs pe-3">
                                    Pengguna Anggaran/Kuasa Pengguna Anggaran yanng menerbitkan SPPD, pegawai yang
                                    melakukan perjalanan dinas para pejabat Disahkan oleh tanggal berangkat/tiba serta
                                    bendahara pengeluaran bertanggung jawab berdasarkan peraturan-peraturan Keuangan
                                    Daerah apabila Daerah menderita rugi akibat kesalahan, kelalaian, dan kealpaannya.
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
