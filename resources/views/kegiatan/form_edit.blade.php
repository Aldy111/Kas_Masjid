@extends('admin.index')
@section('content')
@php
//select option Petugas
$ar_petugas = App\Models\Petugas::all();
@endphp
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
                    <form method="POST" action="{{ route('kegiatan.update',$row->id) }}" 
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Judul Kegiatan</label>
                            <div class="col-sm-10">
                                <input type="text" name="judul_kegiatan" value="{{ $row->judul_kegiatan }}" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Ketua Petugas</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="petugas_id">
                                    <option selected>-- Pilih Petugas  --</option>
                                    @foreach($ar_petugas as $kt)
                                    @php $sel = ($kt->id == $row->petugas_id) ? 'selected' : ''; @endphp
                                    <option value="{{ $kt->id }}" {{ $sel }}>{{ $kt->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Kegiatan</label>
                            <div class="col-sm-10">
                                <input type="date" name="tgl_kegiatan" value="{{ $row->tgl_kegiatan }}" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="ket" style="height: 100px">{{ $row->ket }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="foto">
                                @if(!empty($row->foto)) <img src="{{ url('admin/img')}}/{{$row->foto}}" 
                                                             width="10%" class="img-thumbnail">
                                <br/>{{$row->foto}}
                                @endif
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