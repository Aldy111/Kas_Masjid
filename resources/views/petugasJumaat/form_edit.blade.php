@extends('admin.index')
@section('content')
@php
//select option petugas dan bagian
$ar_petugas = App\Models\Petugas::all();
$ar_bagian = App\Models\Bagian::all();
@endphp
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
                    <form method="POST" action="{{ route('petugasJumaat.update',$row->id) }}" >
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" name="tgl" value="{{ $row->tgl }}" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Petugas Jumaat</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="petugas_id">
                                    <option selected>-- Pilih Petugas Jumaat --</option>
                                    @foreach($ar_petugas as $pj)
                                    @php $sel = ($pj->id == $row->petugas_id) ? 'selected' : ''; @endphp
                                    <option value="{{ $pj->id }}" {{ $sel }}>{{ $pj->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Bagian</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="bagian_id">
                                    <option selected>-- Pilih Bagian --</option>
                                    @foreach($ar_bagian as $b)
                                    @php $sel2 = ($b->id == $row->bagian_id) ? 'selected' : ''; @endphp
                                    <option value="{{ $b->id }}" {{ $sel2 }}>{{ $b->nama }}</option>
                                    @endforeach
                                </select>
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
                                        class="bi bi-save"></i> Ubah</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>

        </div>
    </div>
</section>


@endsection