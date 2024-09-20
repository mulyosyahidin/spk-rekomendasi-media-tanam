<nav class="navbar navbar-expand-lg classic transparent navbar-light">
    <div class="container flex-lg-row flex-nowrap align-items-center">
        <div class="navbar-brand w-100">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo.jpeg') }}" alt="Logo" style="width: 10%;"/>
            </a>
        </div>
        <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
            <div class="offcanvas-header d-lg-none">
                <h3 class="text-white fs-30 mb-0">SPK</h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
            </div>
            <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ activeClass('home') }}" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ activeClass('media-tanam') }}" href="{{ route('media-tanam') }}">Media Tanam</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ activeClass('sistem-tanam') }}" href="{{ route('sistem-tanam') }}">Sistem Tanam</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ activeClass('rekomendasi-media-tanam.*') }}" href="{{ route('rekomendasi-media-tanam.index') }}">Rekomendasi Media Tanam</a>
                    </li>
                </ul>
                <!-- /.navbar-nav -->
            </div>
            <!-- /.offcanvas-body -->
        </div>
        <!-- /.navbar-collapse -->
        <div class="navbar-other ms-lg-4">
            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <li class="nav-item d-lg-none">
                    <button class="hamburger offcanvas-nav-btn"><span></span></button>
                </li>
            </ul>
            <!-- /.navbar-nav -->
        </div>
        <!-- /.navbar-other -->
    </div>
    <!-- /.container -->
</nav>
<!-- /.navbar -->
