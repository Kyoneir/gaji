<!DOCTYPE html>
<html>

<head>
    <title>Print Lokasi</title>
</head>

<body>
    <h1>Data Lokasi</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Lokasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lokasi as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_lokasi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
