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

    <section class="wrapper bg-light">
        <div class="container pb-15 pb-md-17">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                    <form class="contact-form" method="post" action="{{ route('spk.hitung') }}">
                        @csrf

                        <div class="form-floating mb-4">
                            <input id="form_name" type="text" name="nama" class="form-control" placeholder="" required="">
                            <label for="form_name">Nama Tanaman</label>
                        </div>

                        <div class="row">
                            @foreach($dataKriteria as $kriteria)
                                <div class="col-12 col-md-6 mb-4">
                                    <div class="form-select-wrapper">
                                        <select class="form-select" name="nilai[{{ $kriteria->id }}]" required>
                                            <option selected="" disabled="" value="">{{ $kriteria->nama }}</option>
                                            @foreach($kriteria->subKriteria as $subKriteria)
                                                <option value="{{ $subKriteria->id }}">{{ $subKriteria->sub_kriteria }}</option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please select a department. </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="col-12 text-center mt-5">
                            <input type="submit" class="btn btn-primary rounded-pill btn-sm w-100" value="Hitung">
                        </div>
                    </form>
                    <!-- /form -->
                </div>
                <!-- /column -->
            </div>
        </div>
    </section>

</div>
<!-- /.content-wrapper -->

<script src="{{ asset('assets/themes/sandbox/js/plugins.js') }}"></script>
<script src="{{ asset('assets/themes/sandbox/js/theme.js') }}"></script>
</body>

</html>
