<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Lupa Password?</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="{{ asset('assets/images/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="{{ asset('assets/themes/matdash/css/style.login.min.css') }}"/>

    @vite(['resources/js/app.js'])
</head>

<body class="link-sidebar">
<div id="main-wrapper">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
        <div class="position-relative z-index-5">
            <div class="row gx-0">

                <div class="col-lg-6 col-xl-5 col-xxl-4">
                    <div class="min-vh-100 bg-body row justify-content-center align-items-center p-5">
                        <div class="col-12 auth-card">
                            <a href="{{ route('home') }}" class="text-nowrap logo-img d-block w-100">
                                <img src="{{ asset('assets/images/logo.jpeg') }}" class="dark-logo img-fluid"
                                     style="width: 10%" alt="Logo-Dark"/>
                            </a>
                            <h2 class="mb-2 mt-4 fs-7 fw-bolder">Lupa Password?</h2>
                            @if(session()->has('status'))
                                <p class="text-info mb-9">{{ session()->get('status') }}</p>
                            @else
                                <p class="mb-9">Dapatkan kembali password akun Anda</p>
                            @endif

                            <form action="{{ route('password.email') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           id="email" name="email" value="{{ old('email') }}" required>

                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Kirim Email</button>
                                <a href="{{ route('login') }}" class="btn bg-primary-subtle text-primary w-100 py-8">Kembali ke Halaman Login</a>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-xl-7 col-xxl-8 position-relative overflow-hidden bg-dark d-none d-lg-block">
                    <div class="circle-top"></div>
                    <div>
                        <img src="{{ asset('assets/themes/matdash/images/logos/logo-icon.svg') }}" class="circle-bottom"
                             alt="Logo-Dark"/>
                    </div>
                    <div class="d-lg-flex align-items-center z-index-5 position-relative h-n80">
                        <div class="row justify-content-center w-100">
                            <div class="col-lg-6">
                                <h2 class="text-white fs-10 mb-3 lh-base">
                                    Sistem Pendukung Keputusan Penentuan Prioritas Produk Unggulan IKM
                                </h2>
                                <span class="opacity-75 fs-4 text-white d-block mb-3">
                                    Dinas Perindustrian dan Perdagangan Provinsi Bengkulu
                                 </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="dark-transparent sidebartoggler"></div>

</body>

</html>
