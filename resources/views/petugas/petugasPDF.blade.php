<!DOCTYPE html>
<html>
<head>
    <title>Data Petugas Masjid</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h3 align="center">Data Petugas Masjid</h3>
    <table border="1" cellpadding="10" align="center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Gender</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no= 1; @endphp
                    @foreach($petugas as $row)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $row->kode_petugas }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->jabatan->nama_jabatan }}</td>
                        <td>{{ $row->gender }}</td>
                        <td>{{ $row->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

</body>
</html>