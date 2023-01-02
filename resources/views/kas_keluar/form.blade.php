@extends('admin.index')
@section('content')
<div class="pagetitle">
                <h1>Kas Keluar</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Kas Keluar</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Input Kas Keluar</h5>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('kas_keluar.store')}}" 
                        >
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Kode</label>
                            <div class="col-sm-10">
                            <input type="text" name="kode_kas" value="{{ old('kode_kas') }}" 
                                class="form-control @error('kode_kas') is-invalid @enderror">
                                @error('kode_kas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Sumber</label>
                            <div class="col-sm-10">
                            <input type="text" name="sumber" value="{{ old('sumber') }}" 
                                class="form-control @error('sumber') is-invalid @enderror">
                                @error('sumber')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                            <input type="date" name="tanggal" value="{{ old('tanggal') }}" 
                                class="form-control @error('tanggal') is-invalid @enderror">
                                @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Pengeluaran</label>
                            <div class="col-sm-10">
                            <input type="text" name="pengeluaran" value="{{ old('pengeluaran') }}" 
                                class="form-control @error('pengeluaran') is-invalid @enderror">
                                @error('pengeluaran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" style="height: 100px">{{ old('keterangan')}}</textarea>
                                @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 ">

                                <a class="btn btn-info" title="Kembali" href=" {{ url('kas_keluar') }}">
                                    <i class="bi bi-arrow-left-square"> Kembali</i>
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-primary" title="Simpan Kas Masuk"><i
                                        class="bi bi-save"></i> Simpan</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>

        </div>
    </div>
</section>


@endsection