@extends('admin.index')
@section('content')
<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <h5 class="card-title">Data Kas Keluar</h5>
            <br />
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <br />
            <a class="btn btn-primary btn-sm" title="Tambah Kas Keluar" href=" {{ route('kas_keluar.create') }}">
                <i class="bi bi-save"></i>
            </a>&nbsp;
            <a class="btn btn-danger btn-sm" title="Export PDF Petugas" href=" {{ url('kas_keluar-pdf') }}">
                <i class="bi bi-file-pdf"></i>
            </a>&nbsp;
            <a class="btn btn-success btn-sm" title="Export Excel Petugas" href=" {{ url('kas_keluar-excel') }}">
                <i class="bi bi-file-excel"></i>
            </a>&nbsp;
            <br /><br />
            <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Sumber</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Pengeluaran</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no= 1; @endphp
                    @foreach($kk as $row)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $row->kode_kas }}</td>
                        <td>{{ $row->sumber }}</td>
                        <td>{{ $row->tanggal }}</td>
                        <td>{{ $row->pengeluaran }}</td>
                        <td>{{ $row->keterangan }}</td>
                        <td width="20%">
                            <form method="POST" action="{{ route('kas_keluar.destroy',$row->id) }}">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-warning btn-sm" title="Ubah Kas Keluar"
                                    href=" {{ route('kas_keluar.edit',$row->id) }}">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Kas Keluar"
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