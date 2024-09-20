<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Alternatif Media Tanam</title>

    <link rel="stylesheet" href="{{ asset('assets/themes/sandbox/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/themes/sandbox/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/themes/sandbox/css/colors/sky.css') }}">
    <link rel="preload" href="{{ asset('assets/themes/sandbox/css/fonts/urbanist.css') }}" as="style"
          onload="this.rel='stylesheet'">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="{{ asset('assets/images/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    @vite(['resources/js/app.js'])
</head>

<body>
<div class="content-wrapper">
    <header class="wrapper bg-soft-primary">
        @include('public.includes.navbar')
    </header>
    <!-- /header -->

    <section class="wrapper bg-soft-primary position-relative">
        <div class="container pt-10 pb-17 pt-md-14 text-center">
            <div class="row">
                <div class="col-lg-8 mx-auto mb-5">
                    <h1 class="fs-15 text-uppercase text-muted mb-3">Media Tanam</h1>
                    <h3 class="display-1 mb-6">
                        Alternatif media tanam yang dapat digunakan untuk menanam.
                    </h3>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
        <div class="overflow-hidden">
            <div class="divider text-light mx-n2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 60">
                    <path fill="currentColor" d="M0,0V60H1440V0A5771,5771,0,0,1,0,0Z"/>
                </svg>
            </div>
        </div>
    </section>
    <!-- /section -->
    <section class="wrapper bg-light">
        <div class="container pb-15 pb-md-17">
            <div class="row">
                <div class="col-xl-10 mx-auto">

                    <div class="job-list mb-10">
                        <h3 class="mb-4">Media Tanam</h3>

                        @foreach($data as $item)
                            <a href="#" class="card mb-1 lift">
                                <div class="card-body p-5">
                                    <span class="row justify-content-between align-items-center">
                                        <span class="col-md-12 mb-2 mb-md-0 d-flex align-items-center text-body">
                                            <span
                                                class="avatar bg-red text-white w-9 h-9 fs-17 me-3">{{ createAcronym($item->nama, max: 2) }}</span>
                                            {{ $item->nama }}
                                        </span>
                                    </span>
                                </div>
                                <!-- /.card-body -->
                            </a>
                            <!-- /.card -->
                        @endforeach
                    </div>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
</div>
<!-- /.content-wrapper -->

<script src="{{ asset('assets/themes/sandbox/js/plugins.js') }}"></script>
<script src="{{ asset('assets/themes/sandbox/js/theme.js') }}"></script>
</body>

</html>
