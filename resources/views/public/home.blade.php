<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Pendukung Keputusan Rekomendasi Media Tanam</title>

    <link rel="stylesheet" href="{{ asset('assets/themes/sandbox/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/themes/sandbox/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/themes/sandbox/css/colors/sky.css') }}">
    <link rel="preload" href="{{ asset('assets/themes/sandbox/css/fonts/urbanist.css') }}" as="style"
          onload="this.rel='stylesheet'">

    <link rel="icon" href="{{ asset('assets/images/h1.png') }}">

    @vite(['resources/js/app.js'])
</head>

<body>
<div class="content-wrapper">
    <header class="wrapper bg-light">
       @include('public.includes.navbar')
    </header>
    <!-- /header -->
    <section class="wrapper bg-light">
        <div class="container pt-10 pt-md-14 pb-14 pb-md-16 text-center">
            <div class="row gx-lg-8 gx-xl-12 gy-10 gy-xl-0 mb-14 align-items-center">
                <div class="col-lg-7 order-lg-2">
                    <figure>
                        <img class="img-auto" src="{{ asset('assets/images/h2.png') }}" alt="Hero Image" style="width: 65%;" />
                    </figure>
                </div>
                <!-- /column -->
                <div class="col-md-10 offset-md-1 offset-lg-0 col-lg-5 text-center text-lg-start">
                    <h1 class="display-1 fs-48 mb-5 mx-md-n5 mx-lg-0 mt-7">
                        <span class="text-primary">SISTEM PENDUKUNG KEPUTUSAN</span>
                    </h1>
                    <p class="lead fs-lg mb-7">
                        REKOMENDASI MEDIA DAN SISTEM TANAM HIDROPONIK MENGGUNAKAN METODE <i>MULTI OBJECTIVE OPTIMIZATION ON THE BASIS OF RATIO ANALSYSIS</i> (MOORA)
                    </p>
                    <span>
                       @if(auth()->check())
                            <a class="btn btn-lg btn-primary rounded-pill me-2" href="{{ route('admin.dashboard') }}">Dashboard</a>
                        @else
                            <a class="btn btn-lg btn-primary rounded-pill me-2" href="{{ route('login') }}">Login</a>
                        @endif
                    </span>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
        <div class="overflow-hidden">
            <div class="divider text-soft-primary mx-n2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100">
                    <path fill="currentColor"
                          d="M1260,1.65c-60-5.07-119.82,2.47-179.83,10.13s-120,11.48-180,9.57-120-7.66-180-6.42c-60,1.63-120,11.21-180,16a1129.52,1129.52,0,0,1-180,0c-60-4.78-120-14.36-180-19.14S60,7,30,7H0v93H1440V30.89C1380.07,23.2,1319.93,6.15,1260,1.65Z"/>
                </svg>
            </div>
        </div>
        <!-- /.overflow-hidden -->
    </section>
    <!-- /section -->
</div>
<!-- /.content-wrapper -->

<script src="{{ asset('assets/themes/sandbox/js/plugins.js') }}"></script>
<script src="{{ asset('assets/themes/sandbox/js/theme.js') }}"></script>
</body>

</html>
