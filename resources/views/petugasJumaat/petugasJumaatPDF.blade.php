<!DOCTYPE html>
<html>
<head>
    <title>Data Petugas Jumaat Masjid</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h3 align="center">Data Petugas Jumaat Masjid</h3>
    <table border="1" cellpadding="10" align="center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Petugas</th>
                        <th>Bagian</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no= 1; @endphp
                    @foreach($petugasJ as $row)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $row->tgl }}</td>
                        <td>{{ $row->petugas->nama }}</td>
                        <td>{{ $row->bagian->nama }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

</body>
</html>