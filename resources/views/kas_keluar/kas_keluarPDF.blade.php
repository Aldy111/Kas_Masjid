<!DOCTYPE html>
<html>
<head>
    <title>Data Kas Keluar Masjid</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h3 align="center">Data Kas Keluar Masjid</h3>
    <table border="1" cellpadding="10" align="center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Sumber</th>
                        <th>Tanggal</th>
                        <th>Pengeluaran</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no= 1; @endphp
                    @foreach($kk as $row)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $row->kode_kas }}</td>
                        <td>{{ $row->sumber }}</td>
                        <td>{{ $row->tanggal }}</td>
                        <td>{{ $row->pengeluaran }}</td>
                        <td>{{ $row->keterangan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

</body>
</html>