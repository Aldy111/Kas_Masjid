@extends('admin.index')
@section('content')
<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <h5 class="card-title">Data Petugas</h5>
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
                        <th scope="col">Kode</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Status</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no= 1; @endphp
                    @foreach($petugas as $row)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $row->kode_petugas }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->jabatan->nama_jabatan }}</td>
                        <td>{{ $row->gender }}</td>
                        <td>{{ $row->status }}</td>
                        <td width="10%">
                            @empty($row->foto)
                            <img src="{{ url('admin/img/nophoto.png') }}" width="35%" alt="Profile" class="rounded-circle">
                            @else
                            <img src="{{ url('admin/img')}}/{{$row->foto}}" width="35%" alt="Profile" class="rounded-circle">
                            @endempty
                        </td>
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