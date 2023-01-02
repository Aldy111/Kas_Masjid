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
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Input Petugas Jumaat</h5>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('petugasJumaat.store')}}" >
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                            <input type="date" name="tgl" value="{{ old('tgl') }}" 
                                class="form-control @error('tgl') is-invalid @enderror">
                                @error('tgl')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama Petugas</label>
                            <div class="col-sm-10">
                            <select class="form-select @error('petugas_id') is-invalid @enderror" name="petugas_id">
                                    <option selected>-- Pilih Petugas --</option>
                                    @foreach($ar_petugas as $pj)
                                    @php
                                    $sel = (old('petugas_id') == $pj->id)? 'selected':'';
                                    @endphp
                                    <option value="{{ $pj->id }}" {{ $sel }}>{{ $pj->nama }}</option>
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
                            <label class="col-sm-2 col-form-label">Bagian</label>
                            <div class="col-sm-10">
                            <select class="form-select @error('bagian_id') is-invalid @enderror" name="bagian_id">
                                    <option selected>-- Pilih Bagian --</option>
                                    @foreach($ar_bagian as $b)
                                    @php
                                    $sel2 = (old('bagian_id') == $b->id)? 'selected':'';
                                    @endphp
                                    <option value="{{ $b->id }}" {{ $sel2 }}>{{ $b->nama }}</option>
                                    @endforeach
                                </select>
                                @error('bagian_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 ">

                                <a class="btn btn-info" title="Kembali" href=" {{ url('petugasJumaat') }}">
                                    <i class="bi bi-arrow-left-square"> Kembali</i>
                                </a>
                                &nbsp;
                                <button type="submit" class="btn btn-primary" title="Simpan Petugas"><i
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