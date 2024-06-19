<!DOCTYPE html>
<html>

<head>
    <title>Laporan</title>
    <style>
        /* Gaya CSS untuk PDF */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Laporan</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Berat</th>
                <th>Hasil</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($sampah as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->user->nama }}</td>
                    <td>{{ $item->Berat }}</td>
                    <td>{{ $item->Hasil }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
