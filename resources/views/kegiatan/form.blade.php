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
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Input Kegiatan</h5>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('kegiatan.store')}}" 
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Judul Kegiatan</label>
                            <div class="col-sm-10">
                            <input type="text" name="judul_kegiatan" value="{{ old('judul_kegiatan') }}" 
                                class="form-control @error('judul_kegiatan') is-invalid @enderror">
                                @error('judul_kegiatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                            <input type="date" name="tgl_kegiatan" value="{{ old('tgl_kegiatan') }}" 
                                class="form-control @error('tgl_kegiatan') is-invalid @enderror">
                                @error('tgl_kegiatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Ketua Petugas</label>
                            <div class="col-sm-10">
                            <select class="form-select @error('petugas_id') is-invalid @enderror" name="petugas_id">
                                    <option selected>-- Pilih Petugas --</option>
                                    @foreach($ar_petugas as $kt)
                                    @php
                                    $sel = (old('petugas_id') == $kt->id)? 'selected':'';
                                    @endphp
                                    <option value="{{ $kt->id }}" {{ $sel }}>{{ $kt->nama}}</option>
                                    @endforeach
                                </select>
                                @error('petugas_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('ket') is-invalid @enderror" name="ket" style="height: 100px">{{ old('ket')}}</textarea>
                                @error('ket')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input class="form-control @error('foto') is-invalid @enderror" value="{{old('foto')}}" type="file" name="foto">
                                @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 ">

                                <a class="btn btn-info" title="Kembali" href=" {{ url('kegiatan') }}">
                                    <i class="bi bi-arrow-left-square"> Kembali</i>
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-primary" title="Simpan Kegiatan"><i
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