<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{url('/dashboard')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('/petugas') }}">
                        <i class="bi bi-circle"></i><span>Petugas</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/bagian') }}">
                        <i class="bi bi-circle"></i><span>Bagian</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/jabatan') }}">
                        <i class="bi bi-circle"></i><span>Jabatan</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/petugasJumaat')}}">
                        <i class="bi bi-circle"></i><span>Petugas Jumaat</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{url('/kegiatan')}}">
                <i class="bi bi-journal-text"></i><span>Kegiatan</span>
            </a>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Laporan Kas</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{url('/kas_masuk')}}">
                        <i class="bi bi-circle"></i><span>Kas Masuk</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/kas_keluar')}}">
                        <i class="bi bi-circle"></i><span>Kas Keluar</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/laporan_kas')}}">
                        <i class="bi bi-circle"></i><span>Laporan</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->
        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-contact.html">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-register.html">
                <i class="bi bi-card-list"></i>
                <span>Register</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-login.html">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li><!-- End Login Page Nav -->

    </ul>

</aside>