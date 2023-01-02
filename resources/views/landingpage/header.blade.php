<header class="navigation bg-tertiary">
	<nav class="navbar navbar-expand-xl navbar-light text-center py-3">
		<div class="container">
			<a class="navbar-brand" href="{{ url('/home') }}">
				<img loading="prelaod" decoding="async" class="img-fluid" width="250" src="{{url('images/logo2.png')}}" alt="Masjid">
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mx-auto mb-2 mb-lg-0">
					<li class="nav-item"> <a class="nav-link" href="{{ url('/home') }}">Home</a>
					</li>
					<li class="nav-item "> <a class="nav-link" href="{{url('/about') }}">Tentang</a>
					</li>
					<li class="nav-item "> <a class="nav-link" href="{{url('/kegiatan2')}}">Kegiatan</a>
					</li>
					<li class="nav-item "> <a class="nav-link" href="{{url('/pengurus')}}">Kepengurusan</a>
					</li>
					<li class="nav-item "> <a class="nav-link" href="{{ url('/kontak') }}">Kontak</a>
					</li>
					<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item " href="{{url('/kasmasuk')}}">Kas Masuk</a>
							</li>
							<li><a class="dropdown-item " href="{{url('/kaskeluar')}}">Kas Keluar</a>
							</li>
							<li><a class="dropdown-item " href="{{ url('/petugasjumaat2') }}">Jadwal Petugas Jumaat</a>
							</li>
						</ul>
					</li>
				</ul>
				<!-- account btn --> <a href="{{url('/login')}}" class="btn btn-outline-primary">Log In</a>
				<!-- account btn --> <a href="{{url('/register')}}" class="btn btn-primary ms-2 ms-lg-3">Sign Up</a>
			</div>
		</div>
	</nav>
</header>