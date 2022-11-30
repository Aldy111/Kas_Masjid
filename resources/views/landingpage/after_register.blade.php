@extends('landingpage.index')
@section('content')
    

<section class="banner bg-tertiary position-relative overflow-hidden">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="block text-center text-lg-start pe-0 pe-xl-5">
          <h1 class="text-capitalize mb-4">Selamat Anda Sudah Berhasil Register</h1>
          <p class="mb-4">Mohon Tunggu Approve Dari Admin Kami
            <br>Terima Kasih.</p> <a type="button"
            class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#applyLoan">
            Login<span style="font-size: 14px;" class="ms-2 fas fa-arrow-right"></span></a>
        </div>
      </div>
      <!-- <div class="col-lg-6">
        <div class="post-slider slider-sm rounded">
          <img loading="lazy" decoding="async"
            src="{{url('images/banner/banner2.jpg')}}"
            alt="banner image" class="w-100">
        </div>
      </div> -->
      <div class="col-md-6" data-aos="fade">
							<article class="blog-post">
								<div class="post-slider slider-sm rounded rotate-90">
									<img loading="lazy" decoding="async" src="{{url('images/banner/banner1.jpeg')}}" alt="Post Thumbnail">
									<img loading="lazy" decoding="async" src="{{url('images/banner/banner2.jpg')}}" alt="Post Thumbnail">
									<img loading="lazy" decoding="async" src="{{url('images/banner/banner3.jpg')}}" alt="Post Thumbnail">
								</div>
							</article>
						</div>
    </div>
  </div>
</section>


@endsection
