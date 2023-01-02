@extends('admin.index')
@section('content')
<div class="pagetitle">
                <h1>Petugas Jumaat</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Petugas Jumaat</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <h5 class="card-title">Data Petugas Jumaat</h5>
            <br />
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <br />
            @if(Auth::user()->role != 'anggota')
            <a class="btn btn-primary btn-sm" title="Tambah Petugas" href=" {{ route('petugasJumaat.create') }}">
                <i class="bi bi-save"></i>
            </a>
            @endif
            &nbsp;
            <a class="btn btn-danger btn-sm" title="Export PDF Petugas" href=" {{ url('petugasJumaat-pdf') }}">
                <i class="bi bi-file-pdf"></i>
            </a>&nbsp;
            <a class="btn btn-success btn-sm" title="Export Excel Petugas" href=" {{ url('petugasJumaat-excel') }}">
                <i class="bi bi-file-excel"></i>
            </a>&nbsp;
            <br /><br />
            <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nama Petugas Jumaat</th>
                        <th scope="col">Bagian</th>
                        @if(Auth::user()->role != 'anggota')
                        <th scope="col">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @php $no= 1; @endphp
                    @foreach($petugasJ as $row)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{\Carbon\Carbon::parse($row->tgl)->translatedFormat('l,d F Y')}}</td>
                        <td>{{ $row->petugas->nama }}</td>
                        <td>{{ $row->bagian->nama }}</td>
                        <td width="20%">
                            <form method="POST" id="formDelete">
                                @csrf
                                @method('DELETE')
                                @if(Auth::user()->role != 'anggota')
                                <a class="btn btn-warning btn-sm" title="Ubah Petugas"
                                    href=" {{ route('petugasJumaat.edit',$row->id) }}">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                &nbsp;
                                <button type="submit"
                                    data-action="{{ route('petugasJumaat.destroy',$row->id)}}"
                                    class="btn btn-danger btn-sm btnDelete" title="Hapus Petugas">
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