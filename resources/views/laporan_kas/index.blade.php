@extends('admin.index')
@section('content')
<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <h5 class="card-title">Laporan Kas Masjid</h5>
            <br />
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <br />
            <a class="btn btn-primary btn-sm" title="Tambah Petugas" href=" {{ route('petugas.create') }}">
                <i class="bi bi-save"></i>
            </a>&nbsp;
            <a class="btn btn-danger btn-sm" title="Export PDF Petugas" href=" {{ url('petugas-pdf') }}">
                <i class="bi bi-file-pdf"></i>
            </a>&nbsp;
            <a class="btn btn-success btn-sm" title="Export Excel Petugas" href=" {{ url('petugas-excel') }}">
                <i class="bi bi-file-excel"></i>
            </a>&nbsp;
            <br /><br />
            <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Kas</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Sumber</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Jumlah Pemasukan</th>
                        <th scope="col">Jumlah Pengeluaran</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no= 1; @endphp
                    @foreach($lks as $row)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $row->kas_masuk->kode_kas }}</td>
                        <td>{{ $row->kas_masuk->tanggal }}</td>
                        <td>{{ $row->kas_masuk->sumber }}</td>
                        <td>{{ $row->ket }}</td>
                        <td>{{ $row->kas_masuk->Pemasukan }}</td>
                        <td>{{ $row->kas_keluar->pengeluaran }}</td>
                        <td width="20%">
                            <form method="POST" action="{{ route('petugas.destroy',$row->id) }}">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info btn-sm" title="Detail Petugas"
                                    href=" {{ route('petugas.show',$row->id) }}">
                                    <i class="bi bi-eye"></i>
                                </a>
                                &nbsp;
                                <a class="btn btn-warning btn-sm" title="Ubah Petugas"
                                    href=" {{ route('petugas.edit',$row->id) }}">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Petugas"
                                    onclick="return confirm('Anda Yakin Data akan diHapus?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div>

@endsection