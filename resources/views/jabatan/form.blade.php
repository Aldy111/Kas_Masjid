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
<section class="section">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Jabatan</h5>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Terjadi Kesalahan saat input data<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form class="row g-3" method="POST" action="{{ route('jabatan.store')}}">
                        @csrf
                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">Kode Jabatan</label>
                            <input type="text" name="kode_jabatan" value="{{ old('kode_jabatan') }}" 
                                class="form-control @error('kode_jabatan') is-invalid @enderror">
                                @error('kode_jabatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">Jabatan</label>
                            <input type="text" name="nama_jabatan" value="{{ old('nama_jabatan') }}" 
                                class="form-control @error('nama_jabatan') is-invalid @enderror">
                                @error('nama_jabatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Batal</button>
                            <a class="btn btn-info" title="Kembali" href=" {{ url('jabatan') }}">
                                    <i class="bi bi-arrow-left-square"> Kembali</i>
                                </a>
                        </div>
                    </form><!-- Vertical Form -->

                </div>
            </div>
        </div>
    </div>
</section>

@endsection