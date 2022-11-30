@extends('admin.index')
@section('content')
<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <h5 class="card-title">Data Kegiatan</h5>
            <br />
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <br />
            <a class="btn btn-primary btn-sm" title="Tambah Kegiatan" href=" {{ route('kegiatan.create') }}">
                <i class="bi bi-save"></i>
            </a>&nbsp;
            <br /><br />
            <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul Kegiatan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Ketua Petugas</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">foto</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no= 1; @endphp
                    @foreach($kegiatan as $row)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $row->judul_kegiatan }}</td>
                        <td>{{ $row->tgl_kegiatan }}</td>
                        <td>{{ $row->petugas->nama }}</td>
                        <td>{{ $row->ket }}</td>
                        <td width="10%">
                            @empty($row->foto)
                            <img src="{{ url('admin/img/nophoto.png') }}" width="50%" alt="Profile" class="rounded-circle">
                            @else
                            <img src="{{ url('admin/img')}}/{{$row->foto}}" width="50%" alt="Profile" class="rounded-circle">
                            @endempty
                        </td>
                        <td width="20%">
                            <form method="POST" action="{{ route('kegiatan.destroy',$row->id) }}">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info btn-sm" title="Detail Kegiatan"
                                    href=" {{ route('kegiatan.show',$row->id) }}">
                                    <i class="bi bi-eye"></i>
                                </a>
                                &nbsp;
                                <a class="btn btn-warning btn-sm" title="Ubah Kegiatan"
                                    href=" {{ route('kegiatan.edit',$row->id) }}">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Kegiatan"
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