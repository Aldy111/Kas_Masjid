@extends('admin.index')
@section('content')
<div class="pagetitle">
                <h1>Kegiatan</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Kegiatan</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
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
            @if(Auth::user()->role != 'anggota')
            <a class="btn btn-primary btn-sm" title="Tambah Kegiatan" href=" {{ route('kegiatan.create') }}">
                <i class="bi bi-save"></i>
            </a>
            @endif
            &nbsp;
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
                        <td>{{\Carbon\Carbon::parse($row->tgl_kegiatan)->translatedFormat('l,d F Y')}}</td>
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
                            <form method="POST" id="formDelete">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info btn-sm" title="Detail Kegiatan"
                                    href=" {{ route('kegiatan.show',$row->id) }}">
                                    <i class="bi bi-eye"></i>
                                </a>
                                &nbsp;
                                @if(Auth::user()->role != 'anggota')
                                <a class="btn btn-warning btn-sm" title="Ubah Kegiatan"
                                    href=" {{ route('kegiatan.edit',$row->id) }}">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                &nbsp;
                                <button type="submit" 
                                    data-action="{{ route('kegiatan.destroy',$row->id) }}"
                                    class="btn btn-danger btn-sm btnDelete" title="Hapus Kegiatan">
                                    <i class="bi bi-trash"></i>
                                </button>
                                @endif
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">
    $('body').on('click', '.btnDelete', function(e) {
    e.preventDefault();
    var action = $(this).data('action');
    Swal.fire({
        title: 'Yakin ingin menghapus data ini?',
        text: "Data yang sudah dihapus tidak bisa dikembalikan lagi",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Yakin'
    }).then((result) => {
        if (result.isConfirmed) {
            $('#formDelete').attr('action', action);
            $('#formDelete').submit();
        }
    })
})
</script>

@endsection