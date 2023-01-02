@extends('admin.index')
@section('content')
<div class="pagetitle">
                <h1>Jabatan</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Jabatan</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <h5 class="card-title">Data Jabatan</h5>
            <br />
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <br /> 
            @if(Auth::user()->role == 'admin')
            <a class="btn btn-primary btn-sm" title="Kembali" href=" {{ route('jabatan.create') }}">
                <i class="bi bi-save"></i>
            </a>
            @endif
            <br /><br />
            <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">kode_jabatan</th>
                        <th scope="col">Nama</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no= 1; @endphp
                    @foreach($jabatan as $row)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $row->kode_jabatan }}</td>
                        <td>{{ $row->nama_jabatan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div>

@endsection