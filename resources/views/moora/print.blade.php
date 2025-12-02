<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Perangkingan Siswa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: white;
            color: #000;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table thead {
            background-color: #f0f0f0;
        }

        table th {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
            font-weight: bold;
            font-size: 11px;
        }

        table td {
            border: 1px solid #000;
            padding: 6px 8px;
            text-align: center;
            font-size: 10px;
        }

        table td:nth-child(2) {
            text-align: left;
        }

        table tbody tr:nth-child(even) {
            background-color: #fff;
        }

        @media print {
            body {
                padding: 10mm;
            }

            table {
                page-break-inside: auto;
            }

            table tr {
                page-break-inside: avoid;
            }
        }
    </style>
</head>
<body>
    <h1>LAPORAN PERANGKINGAN SISWA</h1>
    <p style="text-align: center; margin-bottom: 10px;">Program Indonesia Pintar - Metode MOORA</p>

    <table>
        <thead>
            <tr>
                <th>Peringkat</th>
                <th>Nama Siswa</th>
                <th>NIS</th>
                <th>Kelas</th>
                @foreach($criteria as $c)
                    <th>{{ $c->name }}</th>
                @endforeach
                <th>Nilai Akhir</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ranking as $r)
                <tr>
                    <td>{{ $r['rank'] }}</td>
                    <td>{{ $r['student']->name }}</td>
                    <td>{{ $r['student']->nis ?? '-' }}</td>
                    <td>{{ $r['student']->class ?? '-' }}</td>
                    @foreach($criteria as $c)
                        <td>{{ isset($r['values'][$c->id]) ? number_format($r['values'][$c->id], 4) : '-' }}</td>
                    @endforeach
                    <td>{{ number_format($r['score'], 6) }}</td>
                    <td>
                        @if($r['rank'] <= $jumlahPenerima)
                            Layak PIP
                        @else
                            Tidak Layak
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        window.print();
    </script>
</body>
</html>
