@extends('admin.index')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Input Petugas</h5>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('petugas.store')}}" 
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Kode</label>
                            <div class="col-sm-10">
                            <input type="text" name="kode_petugas" value="{{ old('kode_petugas') }}" 
                                class="form-control @error('kode_petugas') is-invalid @enderror">
                                @error('kode_petugas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                            <input type="text" name="nama" value="{{ old('nama') }}" 
                                class="form-control @error('nama') is-invalid @enderror">
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                            <select class="form-select @error('jabatan_id') is-invalid @enderror" name="jabatan_id">
                                    <option selected>-- Pilih Jabatan --</option>
                                    @foreach($ar_jabatan as $jab)
                                    @php
                                    $sel = (old('jabatan_id') == $jab->id)? 'selected':'';
                                    @endphp
                                    <option value="{{ $jab->id }}" {{ $sel }}>{{ $jab->nama_jabatan }}</option>
                                    @endforeach
                                </select>
                                @error('jabatan_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                            <div class="col-sm-10">
                                @foreach($ar_gender as $gender)
                                @php
                                    $cek = (old('gender') == $gender)? 'checked':'';
                                @endphp
                                <div class="form-check">
                                    <input class="form-check-input @error('gender') is-invalid @enderror"  type="radio" name="gender" value="{{ $gender }}" {{ $cek }}>
                                    <label class="form-check-label" for="gridRadios1">
                                        {{ $gender }}
                                    </label>
                                </div>
                                @endforeach
                                @error('gender')
                                    <div class="invalid-feedback d-inline">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </fieldset>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                            <div class="col-sm-10">
                                @foreach($ar_status as $status)
                                @php
                                    $cek2 = (old('status') == $status)? 'checked':'';
                                @endphp
                                <div class="form-check">
                                    <input class="form-check-input @error('status') is-invalid @enderror"  type="radio" name="status" value="{{ $status }}" {{ $cek2 }}>
                                    <label class="form-check-label" for="gridRadios1">
                                        {{ $status }}
                                    </label>
                                </div>
                                @endforeach
                                @error('status')
                                    <div class="invalid-feedback d-inline">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </fieldset>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                            <input type="text" name="tmp_lahir" value="{{ old('tmp_lahir') }}" 
                                class="form-control @error('tmp_lahir') is-invalid @enderror">
                                @error('tmp_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                            <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}" 
                                class="form-control @error('tgl_lahir') is-invalid @enderror">
                                @error('tgl_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" style="height: 100px">{{ old('alamat')}}</textarea>
                                @error('alamat')
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

                                <a class="btn btn-info" title="Kembali" href=" {{ url('petugas') }}">
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