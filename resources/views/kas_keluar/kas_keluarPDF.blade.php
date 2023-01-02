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
                <th>Keterangan</th>
                <th>Pengeluaran</th>
              </tr>
            </thead>
            <tbody>
            @php $no= 1; @endphp
                    @foreach($kk as $row)
                    <tr>
                        <td width="7%">{{$no++}}</td>
                        <td width="10%">{{$row->kode_kas}}</td>
                        <td>{{$row->sumber}}</td>
                        <td>{{\Carbon\Carbon::parse($row->tanggal)->translatedFormat('l,d F Y')}}</td>
                        <td>{{$row->keterangan}}</td>
                        <td width="20%">Rp. {{ number_format($row->pengeluaran,2,',','.') }}</td>
                        @php 
                                    $jumlah2[] = $row["pengeluaran"];
                                    $jumlahConvert = str_replace('.', '', $jumlah2);
                                    $totali = array_sum($jumlahConvert);
                                    $hasilJumlah = number_format($totali, 2, ',', '.');
                      @endphp
                    </tr>
                    @endforeach
                    @if(isset($jumlah2) != null) 
                                <tr>
                                    <td colspan="5"><b>Total Pengeluaran<b></td>
                                    <td id="total" data-target="total">Rp.
                                    {{$hasilJumlah}}
                                    </td>
                                </tr>
                    @endif
            </tbody>
            </table>

</body>
</html>