<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Perhitungan SPK MOORA</title>

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
                    <h1 class="fs-15 text-uppercase text-muted mb-3">Sistem Pendukung Keputusan</h1>
                    <h3 class="display-5 mb-6">
                        Tentukan media dan sistem tanam yang sesuai dengan tanaman Anda.
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
                <div class="col-lg-10 mx-auto mb-5">
                    <div class="blog single mt-n17">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <h2 class="h1 mb-3">{{ $perhitungan_user->nama_tanaman }}</h2>

                                <div class="row gy-3 gx-xl-8">
                                    <div class="col-xl-6">
                                        <ul class="icon-list bullet-bg bullet-soft-primary mb-0">
                                            @foreach($perhitungan_user->karakteristik->take(ceil($perhitungan_user->karakteristik->count() / 2)) as $karakteristik)
                                                <li>
                                                    <span><i class="uil uil-location-arrow me-1"></i></span>
                                                    <span>{{ $karakteristik->kriteria->nama }}</span>
                                                    <br>
                                                    <span class="text-muted">
                                                        {{ $karakteristik->subKriteria->sub_kriteria }}
                                                    </span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!--/column -->

                                    <div class="col-xl-6">
                                        <ul class="icon-list bullet-bg bullet-soft-primary mb-0">
                                            @foreach($perhitungan_user->karakteristik->skip(ceil($perhitungan_user->karakteristik->count() / 2)) as $karakteristik)
                                                <li>
                                                    <span><i class="uil uil-location-arrow me-1"></i></span>
                                                    <span>{{ $karakteristik->kriteria->nama }}</span>
                                                    <br>
                                                    <span class="text-muted">
                                                       {{ $karakteristik->subKriteria->sub_kriteria }}
                                                    </span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!--/column -->
                                </div>
                                <!--/.row -->

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.blog -->
                </div>

                <div class="col-10 mx-auto mt-5">
                    <p>
                        Berikut merupakan rekomendasi alternatif media tanam dan sistem tanam untuk
                        <b>{{ $perhitungan_user->nama_tanaman }}</b>. Perhitungan ini dilakukan menggunakan metode MOORA
                        (Multi-Objective Optimization by Ratio Analysis). Kolom angka disisi kanan
                        menunjukkan nilai hasil perhitungan yang diperoleh dari metode MOORA.
                    </p>

                    <p>
                        Perhitungan dilakukan menggunakan {{ $kriteria->count() }} kriteria,
                        yaitu {{ $kriteria->pluck('nama')->join(', ') }}.
                    </p>
                </div>

                <div class="col-xl-10 mx-auto">

                    <div class="job-list mb-10">
                        <h3 class="mb-4">Rekomendasi Alternatif Media Tanam dan Sistem Tanam</h3>

                        @foreach($perhitungan_user->hasil as $item)
                            <div class="card mb-1 lift">
                                <div class="card-body p-5">
                                    <span class="row justify-content-between align-items-center">
                                        <span class="col-md-9 mb-2 mb-md-0 d-flex align-items-center text-body">
                                            <span
                                                class="avatar bg-red text-white w-9 h-9 fs-17 me-3">{{ $item->peringkat }}</span>
                                            Media Tanam {{ $item->mediaTanam->nama }} dan Sistem Tanam {{ $item->sistemTanam->nama }}
                                        </span>
                                        <span class="col-3 col-md-3 text-body d-flex align-items-center">
                                            <i class="uil uil-code-branch me-1"></i> {{ $item->nilai }}
                                        </span>
                                    </span>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        @endforeach
                    </div>
                </div>

                <div class="col-10 mx-auto mt-5">
                    <p>
                        Anda dapat memilih untuk menggunakan metode manapun berdasarkan rekomendasi kami, ketersediaan
                        alat dan bahan serta biaya yang Anda miliki.
                    </p>
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
