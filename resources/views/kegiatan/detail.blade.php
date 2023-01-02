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
<section class="section profile">
    <div class="row">
        <div class="col-xl-12">
            <!-- Card with an image on left -->
          <div class="card mb-3">
          @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ url('admin/img')}}/{{$row->foto}}" class="img-fluid rounded-start" alt="foto">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{ $row->judul_kegiatan }}</h5>
                  <p class="card-text">{{ $row->ket }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</section>



@endsection