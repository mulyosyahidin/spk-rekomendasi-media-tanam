<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Alternatif Sistem Tanam</title>

    <link rel="stylesheet" href="{{ asset('assets/themes/sandbox/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/themes/sandbox/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/themes/sandbox/css/colors/sky.css') }}">
    <link rel="preload" href="{{ asset('assets/themes/sandbox/css/fonts/urbanist.css') }}" as="style"
          onload="this.rel='stylesheet'">

    <link rel="icon" href="{{ asset('assets/images/h1.png') }}">

    <style>
        .accordion .card {
            border: 1px solid #ddd;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .accordion .card-header button {
            background-color: #fff;
            border: none;
            box-shadow: none;
        }

        .accordion .card-header button:focus {
            outline: none;
            box-shadow: none;
        }

        .accordion .accordion-icon {
            transition: transform 0.3s ease;
        }

        .accordion .accordion-collapse.show .accordion-icon {
            transform: rotate(180deg);
        }

    </style>

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
                    <h1 class="fs-15 text-uppercase text-muted mb-3">Sistem Tanam</h1>
                    <h3 class="display-1 mb-6">
                        Alternatif sistem tanam yang dapat digunakan untuk menanam.
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

                        <div class="accordion" id="mediaTanamAccordion">
                            @foreach($data as $index => $item)
                                <div class="card mb-1 lift">
                                    <div class="card-header p-0" id="heading{{ $index }}">
                                        <button
                                            class="btn w-100 text-start p-5 d-flex align-items-center justify-content-between"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $index }}"
                                            aria-expanded="false" aria-controls="collapse{{ $index }}">
                                            <span class="d-flex align-items-center text-body">
                                                @if($item->foto)
                                                    <img src="{{ asset($item->foto) }}"
                                                         class="avatar w-9 h-9 me-3" alt="{{ $item->nama }}">
                                                @else
                                                    <span class="avatar bg-red text-white w-9 h-9 fs-17 me-3">
                                                    {{ createAcronym($item->nama, max: 2) }}
                                                </span>
                                                @endif
                                                {{ $item->nama }}
                                            </span>
                                            <span class="accordion-icon">
                                                <i class="fas fa-chevron-down"></i>
                                            </span>
                                        </button>
                                    </div>
                                    <div id="collapse{{ $index }}"
                                         class="accordion-collapse collapse"
                                         aria-labelledby="heading{{ $index }}"
                                         data-bs-parent="#mediaTanamAccordion">
                                        <div class="card-body p-5">
                                            @if($item->foto)
                                                <a href="{{ asset($item->foto) }}" target="_blank">
                                                    <img src="{{ asset($item->foto) }}"
                                                         class="img-fluid mb-4 rounded" alt="{{ $item->nama }}"/>
                                                </a>
                                            @endif

                                            {{ $item->deskripsi ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

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
