@extends('admin.index')
@section('content')
<div class="pagetitle">
                <h1>Kelola User</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Kelola User</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Input User</h5>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('kelola_user.store')}}" 
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                            <input type="text" name="name" value="{{ old('name') }}" 
                                class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                            <input type="email" name="email" value="{{ old('email') }}" 
                                class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Role</legend>
                            <div class="col-sm-10">
                                @foreach($ar_role as $role)
                                @php
                                    $cek = (old('role') == $role)? 'checked':'';
                                @endphp
                                <div class="form-check">
                                    <input class="form-check-input @error('role') is-invalid @enderror"  type="radio" name="role" value="{{ $role }}" {{ $cek }}>
                                    <label class="form-check-label" for="gridRadios1">
                                        {{ $role }}
                                    </label>
                                </div>
                                @endforeach
                                @error('role')
                                    <div class="invalid-feedback d-inline">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </fieldset>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                            <div class="col-sm-10">
                                @foreach($ar_isactive as $status)
                                @php
                                    $cek2 = (old('isactive') == $status)? 'checked':'';
                                @endphp
                                <div class="form-check">
                                    <input class="form-check-input @error('isactive') is-invalid @enderror"  type="radio" name="isactive" value="{{ $status }}" {{ $cek2 }}>
                                    <label class="form-check-label" for="gridRadios1">
                                        {{ $status }}
                                    </label>
                                </div>
                                @endforeach
                                @error('isactive')
                                    <div class="invalid-feedback d-inline">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </fieldset>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">password</label>
                            <div class="col-sm-10">
                            <input type="password" name="password" value="{{ old('password') }}" 
                                class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">confirmed password</label>
                            <div class="col-sm-10">
                            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" 
                                class="form-control @error('password_confirmation') is-invalid @enderror">
                                @error('password_confirmation')
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

                                <a class="btn btn-info" title="Kembali" href=" {{ url('kelola_user') }}">
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