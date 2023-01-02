@extends('admin.index')
@section('content')
<div class="pagetitle">
                <h1>Petugas</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Petugas</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
<section class="section profile">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    @empty($row->foto)
                    <img src="{{ url('admin/img/nophoto.png') }}" alt="Profile" class="rounded-circle">
                    @else
                    <img src="{{ url('admin/img')}}/{{$row->foto}}" alt="Profile" class="rounded-circle">
                    @endempty
                    <h2>{{ $row->nama }}</h2>
                    <h3>{{ $row->jabatan->nama_jabatan }}</h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-secondary">
                        NIP: {{ $row->kode_petugas }}
                        <br />Status: {{ $row->status }}
                        <br />Jenis Kelamin: {{ $row->gender }}
                        <br />Tempat Lahir: {{ $row->tmp_lahir }}
                        <br />Tanggal Lahir: {{\Carbon\Carbon::parse($row->tgl_lahir)->translatedFormat('l,d F Y')}}
                        <br />Alamat: {{ $row->alamat }}
                    </div>
                    <a class="btn btn-info btn-sm" title="Kembali" href=" {{ url('petugas') }}">
                        <i class="bi bi-arrow-left-square"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>



@endsection