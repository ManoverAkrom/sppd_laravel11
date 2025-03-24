<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan SPPD</title>
    <link rel="stylesheet" href="{{ asset('assets/css/print-report.css') }}">
</head>

<body>
    <h1>Laporan Keuangan SPPD</h1>
    <table>
        <thead>
            <tr>
                <th class="center">No</th>
                <th>Nomor SPPD</th>
                <th>Nama yang diperintah</th>
                <th>Tujuan</th>
                <th>Tanggal Perjalanan</th>
                <th colspan="2" class="center">Pengeluaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr class="{{ $loop->even ? 'even-row' : '' }}">
                    <td class="center">{{ $loop->iteration }}</td>
                    <td>{{ $report->sppd->no_spt }}</td>
                    <td>{{ $report->sppd->name->name }}</td>
                    <td>{{ $report->sppd->tempat_tujuan }}</td>
                    <td>{{ \Carbon\Carbon::parse($report->tgl_berangkat)->translatedFormat('d F Y') }}</td>
                    <td class="currency">Rp.</td> <!-- Currency aligned to the left with no border -->
                    <td class="exp-value">{{ number_format($report->total_expenditure ?? 0, 0, ',', '.') }}</td>
                    <!-- Value aligned to the right -->
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="center"><strong>Total Pengeluaran</strong></td>
                <td class="currency">Rp.</td> <!-- Currency aligned to the left with no border -->
                <td class="exp-value">{{ number_format($reports->sum('total_expenditure') ?? 0, 0, ',', '.') }}</td>
                <!-- Value aligned to the right -->
            </tr>
        </tfoot>
    </table>
    <div class="no-print"></div>
</body>

</html>
