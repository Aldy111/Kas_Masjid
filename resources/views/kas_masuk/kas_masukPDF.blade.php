<!DOCTYPE html>
<html>
<head>
    <title>Data Kas Masuk Masjid</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h3 align="center">Data Kas Masuk Masjid</h3>
    <table border="1" cellpadding="10" align="center">
    <thead>
              <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Sumber</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Pemasukan</th>
              </tr>
            </thead>
            <tbody>
            @php $no= 1; @endphp
                    @foreach($km as $row)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$row->kode_kas}}</td>
                        <td>{{$row->sumber}}</td>
                        <td>{{\Carbon\Carbon::parse($row->tanggal)->translatedFormat('l,d F Y')}}</td>
                        <td>{{$row->keterangan}}</td>
                        <td>Rp. {{ number_format($row->Pemasukan,2,',','.') }}</td>
                      @php 
                                    $jumlah2[] = $row["Pemasukan"];
                                    $jumlahConvert = str_replace('.', '', $jumlah2);
                                    $totali = array_sum($jumlahConvert);
                                    $hasilJumlah = number_format($totali, 2, ',', '.');
                      @endphp
                    </tr>
                    @endforeach
                    

                    @if(isset($jumlah2) != null) 
                                <tr>
                                    <td colspan="5"><b>Total Pemasukkan<b></td>
                                    <td id="total" data-target="total">Rp.
                                    {{$hasilJumlah}}
                                    </td>
                                </tr>
                    @endif
            </tbody>
            </table>

</body>
</html>